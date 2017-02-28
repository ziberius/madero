USE `made4832_radio`;
DROP PROCEDURE IF EXISTS `sp_select_post_from_tag`;

DELIMITER $$
USE `made4832_radio`$$
CREATE PROCEDURE `sp_select_post_from_tag`(
  IN p_limit INT, p_offset INT, p_id_tag INT)


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
      u.ID                AS id_author,
      u.user_login        AS login,
      u.user_nicename     AS nicename,
      u.user_email        AS email,
      u.display_name
    FROM wp_posts p
      INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
      INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
      INNER JOIN wp_users u ON p.post_author = u.ID
    WHERE
      p.post_status = 'publish'
      AND p.post_type = 'post'
      AND tax.taxonomy = 'post_tag'
      AND tax.term_id = p_id_tag
    GROUP BY
      p.ID,
      p.post_title,
      p.post_content,
      p.post_date,
      p.post_date_gmt,
      p.post_status,
      p.post_type,
      p.post_name,
      p.post_parent,
      p.guid,
      p.post_mime_type,
      p.post_modified,
      p.post_modified_gmt,
      u.ID,
      u.user_login,
      u.user_nicename,
      u.user_email,
      u.display_name
    ORDER BY p.post_date DESC
    LIMIT p_limit OFFSET p_offset;

  END$$

DELIMITER ;