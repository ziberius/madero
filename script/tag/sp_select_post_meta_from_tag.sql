USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_meta_from_tag`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_meta_from_tag`(
  IN p_limit INT, p_offset INT, p_id_tag INT)


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
                   SELECT DISTINCT p.ID AS id
                   FROM wp_posts p
                     INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id
                     INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                     INNER JOIN wp_users u ON p.post_author = u.ID
                   WHERE
                     p.post_status = 'publish'
                     AND p.post_type = 'post'
                     AND tax.taxonomy = 'post_tag'
                     AND tax.term_id = p_id_tag
                   ORDER BY p.post_date DESC
                   LIMIT p_limit OFFSET p_offset

                 ) AS temporary_table ON temporary_table.id = post_id
    WHERE meta_key IN ('OPINION-AUTOR', 'OPINION-TWITTER', 'OPINION-CARGO', '_thumbnail_id');

  END$$

DELIMITER ;