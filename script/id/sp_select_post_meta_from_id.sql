USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_meta_from_id`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_meta_from_id`(
  IN p_id_post INT)

READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      meta_id    AS id,
      post_id    AS id_post,
      meta_key,
      meta_value AS value
    FROM wp_postmeta
    WHERE post_id = p_id_post
          AND meta_key IN ('OPINION-AUTOR', 'OPINION-TWITTER', 'OPINION-CARGO', '_thumbnail_id');

  END$$

DELIMITER ;