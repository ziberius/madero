USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_tag_from_id`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_tag_from_id`(
  IN p_id_post INT)

READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      term_rel.object_id AS id_post,
      terms.term_id      AS id_tag,
      terms.name         AS name,
      terms.slug         AS slug
    FROM wp_term_relationships term_rel
      INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_id = term_rel.term_taxonomy_id
      INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id
    WHERE term_tax.taxonomy = 'post_tag'
          AND term_rel.object_id = p_id_post;

  END$$

DELIMITER ;