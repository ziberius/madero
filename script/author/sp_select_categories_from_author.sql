USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_categories_from_author`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_categories_from_author`(
  IN p_start_date VARCHAR(10), p_end_date VARCHAR(10), p_limit INT, p_offset INT, p_id_author VARCHAR(40))


READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      temporary_table.id AS id_post,
      terms.term_id      AS id_category,
      terms.name         AS name
    FROM wp_term_relationships term_rel
      INNER JOIN (
                   SELECT DISTINCT p.ID AS id
                   FROM wp_posts p
                     INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
                     INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                     INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
                   WHERE DATE(p.post_date) >= STR_TO_DATE(p_start_date, '%d/%m/%Y')
                         AND DATE(p.post_date) <= STR_TO_DATE(p_end_date, '%d/%m/%Y')
                         AND p.post_status = 'publish'
                         AND p.post_type = 'post'
                         AND p.post_author = p_id_author
                         AND tax.taxonomy = 'category'
                         AND ter.name <> 'OPINION'
                   ORDER BY p.post_date DESC
                   LIMIT p_limit OFFSET p_offset

                 ) AS temporary_table ON temporary_table.id = term_rel.object_id
      INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_taxonomy_id = term_rel.term_taxonomy_id
      INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id
    WHERE term_tax.taxonomy = 'category';

  END$$

DELIMITER ;