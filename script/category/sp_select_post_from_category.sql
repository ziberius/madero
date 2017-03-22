USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_from_category`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_from_category`(
  IN p_start_date VARCHAR(10), p_end_date VARCHAR(10), p_limit INT, p_offset INT, p_categories VARCHAR(40), p_exclusions VARCHAR(40))


READS SQL DATA
DETERMINISTIC
  BEGIN

    SET @stmt = 'SELECT ';
    SET @stmt = CONCAT(@stmt, '  p.ID                AS id, ');
    SET @stmt = CONCAT(@stmt, '  p.post_title        AS title, ');
    SET @stmt = CONCAT(@stmt, '  p.post_content      AS content, ');
    SET @stmt = CONCAT(@stmt, '  p.post_date         AS date, ');
    SET @stmt = CONCAT(@stmt, '  p.post_date_gmt     AS date_gmt, ');
    SET @stmt = CONCAT(@stmt, '  p.post_status       AS status, ');
    SET @stmt = CONCAT(@stmt, '  p.post_type         AS type, ');
    SET @stmt = CONCAT(@stmt, '  p.post_name         AS name, ');
    SET @stmt = CONCAT(@stmt, '  p.post_parent       AS id_parent, ');
    SET @stmt = CONCAT(@stmt, '  p.guid              AS guid, ');
    SET @stmt = CONCAT(@stmt, '  p.post_mime_type    AS mime_type, ');
    SET @stmt = CONCAT(@stmt, '  p.post_modified     AS modified, ');
    SET @stmt = CONCAT(@stmt, '  p.post_modified_gmt AS modified_gmt, ');
    SET @stmt = CONCAT(@stmt, '  u.ID                AS id_author, ');
    SET @stmt = CONCAT(@stmt, '  u.user_login        AS login, ');
    SET @stmt = CONCAT(@stmt, '  u.user_nicename     AS nicename, ');
    SET @stmt = CONCAT(@stmt, '  u.user_email        AS email, ');
    SET @stmt = CONCAT(@stmt, '  u.display_name ');
    SET @stmt = CONCAT(@stmt, 'FROM wp_posts p ');
    SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id ');
    SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ');
    SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_users u ON p.post_author = u.ID ');
    SET @stmt = CONCAT(@stmt, 'WHERE DATE(p.post_date) >= STR_TO_DATE(\'', p_start_date, '\', \'%d/%m/%Y\') ');
    SET @stmt = CONCAT(@stmt, '      AND DATE(p.post_date) <= STR_TO_DATE(\'', p_end_date, '\', \'%d/%m/%Y\') ');
    SET @stmt = CONCAT(@stmt, '      AND p.post_status = \'publish\' ');
    SET @stmt = CONCAT(@stmt, '      AND p.post_type = \'post\'  ');
    SET @stmt = CONCAT(@stmt, '      AND tax.taxonomy = \'category\' ');
    SET @stmt = CONCAT(@stmt, '      AND tax.term_taxonomy_id IN (', p_categories, ')  ');
    IF (p_exclusions <> '') THEN
      SET @stmt = CONCAT(@stmt, '      AND p.ID NOT IN ( ');
      SET @stmt = CONCAT(@stmt, '         SELECT object_id AS id_post_excluded ');
      SET @stmt = CONCAT(@stmt, '         FROM wp_term_relationships exclude ');
      SET @stmt = CONCAT(@stmt, '         WHERE exclude.term_taxonomy_id IN (', p_exclusions, ') ');
      SET @stmt = CONCAT(@stmt, '      ) ');
    END IF;
    SET @stmt = CONCAT(@stmt, 'GROUP BY ');
    SET @stmt = CONCAT(@stmt, '  p.ID, ');
    SET @stmt = CONCAT(@stmt, '  p.post_title, ');
    SET @stmt = CONCAT(@stmt, '  p.post_content, ');
    SET @stmt = CONCAT(@stmt, '  p.post_date, ');
    SET @stmt = CONCAT(@stmt, '  p.post_date_gmt, ');
    SET @stmt = CONCAT(@stmt, '  p.post_status, ');
    SET @stmt = CONCAT(@stmt, '  p.post_type, ');
    SET @stmt = CONCAT(@stmt, '  p.post_name, ');
    SET @stmt = CONCAT(@stmt, '  p.post_parent, ');
    SET @stmt = CONCAT(@stmt, '  p.guid, ');
    SET @stmt = CONCAT(@stmt, '  p.post_mime_type, ');
    SET @stmt = CONCAT(@stmt, '  p.post_modified, ');
    SET @stmt = CONCAT(@stmt, '  p.post_modified_gmt, ');
    SET @stmt = CONCAT(@stmt, '  u.ID, ');
    SET @stmt = CONCAT(@stmt, '  u.user_login, ');
    SET @stmt = CONCAT(@stmt, '  u.user_nicename, ');
    SET @stmt = CONCAT(@stmt, '  u.user_email, ');
    SET @stmt = CONCAT(@stmt, '  u.display_name ');
    SET @stmt = CONCAT(@stmt, 'HAVING count(tax.term_taxonomy_id) = LENGTH(\'', p_categories, '\') - LENGTH(REPLACE(\'',
                       p_categories, '\', \',\' , \'\')) + 1 ');
    SET @stmt = CONCAT(@stmt, 'ORDER BY p.post_date DESC ');
    SET @stmt = CONCAT(@stmt, 'LIMIT ', p_limit, ' OFFSET ', p_offset);


    PREPARE stmt FROM @stmt;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

  END$$

DELIMITER ;