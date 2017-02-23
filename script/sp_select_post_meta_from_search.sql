USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_meta_from_search`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_meta_from_search`(
  IN p_limit INT, p_offset INT, p_keyword VARCHAR(200))

READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      meta_id    AS id,
      post_id    AS id_post,
      meta_key,
      meta_value AS value
    FROM wp_postmeta
      INNER JOIN (
                   SELECT p.ID AS id
                   FROM wp_posts p
                     INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
                     INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                     INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
                     INNER JOIN wp_users user ON p.post_author = user.ID
                   WHERE p.post_status = 'publish'
                         AND p.post_type = 'post'
                         AND (p.post_title LIKE CONCAT('%', p_keyword, '%') OR
                              p.post_content LIKE CONCAT('%', p_keyword, '%'))
                         AND tax.taxonomy = 'category'
                         AND ter.name <> 'EXTERNO'
                   ORDER BY p.post_date DESC
                   LIMIT p_limit OFFSET p_offset
                 ) AS temporary_table ON temporary_table.id = post_id
    WHERE meta_key IN ('OPINION-AUTOR', 'OPINION-TWITTER', 'OPINION-CARGO', '_thumbnail_id');

  END$$

DELIMITER ;