USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_categories_from_category`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_categories_from_category`(
  IN p_start_date VARCHAR(10), p_end_date VARCHAR(10), p_limit INT, p_offset INT, p_categories VARCHAR(40))


READS SQL DATA
DETERMINISTIC
  BEGIN

    SET @stmt = 'SELECT ';
    SET @stmt = CONCAT(@stmt, '  temporary_table.id AS id_post, ');
    SET @stmt = CONCAT(@stmt, '  terms.term_id      AS id_category, ');
    SET @stmt = CONCAT(@stmt, '  terms.name         AS name ');
    SET @stmt = CONCAT(@stmt, 'FROM wp_term_relationships term_rel ');
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
    SET @stmt = CONCAT(@stmt, 'GROUP BY  p.ID ');
    SET @stmt = CONCAT(@stmt, 'HAVING count(tax.term_taxonomy_id) = LENGTH(\'', p_categories, '\') - LENGTH(REPLACE(\'',
                       p_categories, '\', \',\' , \'\')) + 1 ');
    SET @stmt = CONCAT(@stmt, 'ORDER BY p.post_date DESC ');
    SET @stmt = CONCAT(@stmt, 'LIMIT ', p_limit, ' OFFSET ', p_offset);

    SET @stmt = CONCAT(@stmt, '             ) AS temporary_table ON temporary_table.id = term_rel.object_id ');
    SET @stmt = CONCAT(@stmt,
                       '  INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_taxonomy_id = term_rel.term_taxonomy_id ');
    SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id ');
    SET @stmt = CONCAT(@stmt, 'WHERE term_tax.taxonomy = \'category\' ');


    PREPARE stmt FROM @stmt;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

  END$$

DELIMITER ;