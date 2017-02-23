USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_meta_from_category`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_meta_from_category`(
  IN p_start_date VARCHAR(10), p_end_date VARCHAR(10), p_limit INT, p_offset INT, p_category VARCHAR(40))


READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      meta_id    AS id,
      post_id    AS id_post,
      meta_key,
      meta_value AS value
    FROM wp_postmeta
      INNER JOIN (SELECT p.ID AS id
                  FROM wp_posts p
                    INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
                    INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                    INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
                  WHERE DATE(p.post_date) >= STR_TO_DATE(p_start_date, '%d/%m/%Y')
                        AND DATE(p.post_date) <= STR_TO_DATE(p_end_date, '%d/%m/%Y')
                        AND p.post_status = 'publish'
                        AND p.post_type = 'post'
                        AND tax.taxonomy = 'category'
                        AND ter.name = p_category
                  ORDER BY p.post_date DESC
                  LIMIT p_limit OFFSET p_offset) AS temporary_table ON temporary_table.id = post_id
    WHERE meta_key IN ('OPINION-AUTOR', 'OPINION-TWITTER', 'OPINION-CARGO', '_thumbnail_id');

  END$$

DELIMITER ;