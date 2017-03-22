USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_meta_from_category`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_meta_from_category`(
  IN p_start_date VARCHAR(10), p_end_date VARCHAR(10), p_limit INT, p_offset INT, p_categories VARCHAR(40), p_exclusions VARCHAR(40))


READS SQL DATA
DETERMINISTIC
  BEGIN

    SET @stmt = 'SELECT ';
    SET @stmt = CONCAT(@stmt, '  meta_id    AS id, ');
    SET @stmt = CONCAT(@stmt, '  post_id    AS id_post, ');
    SET @stmt = CONCAT(@stmt, '  meta_key, ');
    SET @stmt = CONCAT(@stmt, '  meta_value AS value ');
    SET @stmt = CONCAT(@stmt, 'FROM wp_postmeta ');
    SET @stmt = CONCAT(@stmt, '  INNER JOIN ( ');

    SET @stmt = CONCAT(@stmt, 'SELECT p.ID AS id ');
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
    SET @stmt = CONCAT(@stmt, 'GROUP BY  p.ID ');
    SET @stmt = CONCAT(@stmt, 'HAVING count(tax.term_taxonomy_id) = LENGTH(\'', p_categories, '\') - LENGTH(REPLACE(\'',
                       p_categories, '\', \',\' , \'\')) + 1 ');
    SET @stmt = CONCAT(@stmt, 'ORDER BY p.post_date DESC ');
    SET @stmt = CONCAT(@stmt, 'LIMIT ', p_limit, ' OFFSET ', p_offset);

    SET @stmt = CONCAT(@stmt, '   ) AS temporary_table ON temporary_table.id = post_id ');
    SET @stmt = CONCAT(@stmt,
                       'WHERE meta_key IN (\' OPINION - AUTOR \', \' OPINION - TWITTER \', \' OPINION - CARGO \', \'_thumbnail_id\') ');

    PREPARE stmt FROM @stmt;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;


  END$$

DELIMITER ;