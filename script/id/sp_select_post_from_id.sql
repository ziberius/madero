USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_from_id`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_from_id`(
  IN p_id_post INT)

READS SQL DATA
DETERMINISTIC
  BEGIN

    SELECT
      p.ID                AS id,
      p.post_title        AS title,
      p.post_content      AS content,
      p.post_date         AS date,
      p.post_date_gmt     AS date_gmt,
      p.post_status       AS status,
      p.post_type         AS type,
      p.post_name         AS name,
      p.post_parent       AS id_parent,
      p.guid              AS guid,
      p.post_mime_type    AS mime_type,
      p.post_modified     AS modified,
      p.post_modified_gmt AS modified_gmt,
      user.ID             AS id_author,
      user.user_login     AS login,
      user.user_nicename  AS nicename,
      user.user_email     AS email,
      user.display_name
    FROM wp_posts p
      LEFT JOIN wp_users user ON p.post_author = user.ID
    WHERE p.ID = p_id_post;

  END$$

DELIMITER ;