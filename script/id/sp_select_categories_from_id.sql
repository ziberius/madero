USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_categories_from_id`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_categories_from_id`(
  IN p_id_post INT)

READS SQL DATA
DETERMINISTIC
  BEGIN


    SELECT
      term_rel.object_id AS id_post,
      terms.term_id      AS id_category,
      terms.name         AS name
    FROM wp_term_relationships term_rel
      INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_taxonomy_id = term_rel.term_taxonomy_id
      INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id
    WHERE term_rel.object_id = p_id_post
          AND term_tax.taxonomy = 'category';

  END$$

DELIMITER ;