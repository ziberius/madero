USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_tag_from_tag`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_tag_from_tag`(
  IN p_limit INT, p_offset INT, p_id_tag INT)


READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      temporary_table.ID AS id_post,
      terms.term_id      AS id_tag,
      terms.name         AS name,
      terms.slug         AS slug
    FROM wp_term_relationships term_rel
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

                 ) AS temporary_table ON temporary_table.id = term_rel.object_id
      INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_id = term_rel.term_taxonomy_id
      INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id
    WHERE term_tax.taxonomy = 'post_tag';

    -- 14850

  END$$

DELIMITER ;