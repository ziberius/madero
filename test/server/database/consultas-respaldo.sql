SELECT *
FROM wp_posts;

SELECT
  ID,
  post_date,
  post_title,
  post_status,
  post_name,
  guid
FROM wp_posts
WHERE post_author <> 1;


SELECT *
FROM wp_options
WHERE option_name = "NOMBRE";
COMMIT;


INSERT INTO wp_postmeta (meta_key, post_id, meta_value) VALUES ('TYPE', 16753, 'EMBEDLY');
COMMIT;

SELECT * Ç
FROM wp_posts
WHERE ID = 16753;

SELECT *
FROM wp_postmeta
WHERE post_id = 16753 AND meta_id = 91699;


SELECT
  pm.meta_id,
  pm.post_id,
  pm.meta_key,
  pm.meta_value,
  p.ID,
  p.post_author,
  p.post_date,
  p.post_date_gmt,
  p.post_content,
  p.post_title,
  p.post_excerpt,
  p.post_status,
  p.comment_status,
  p.ping_status,
  p.post_password,
  p.post_name,
  p.to_ping,
  p.pinged,
  p.post_modified,
  p.post_modified_gmt,
  p.post_content_filtered,
  p.post_parent,
  p.guid,
  p.menu_order,
  p.post_type,
  p.post_mime_type,
  p.comment_count
FROM wp_postmeta AS pm LEFT JOIN wp_posts AS p ON pm.post_id = p.id
WHERE meta_key = 'TYPE' AND meta_value = 'EMBEDLY';

SELECT post_content AS url
FROM wp_postmeta AS pm LEFT JOIN wp_posts AS p ON pm.post_id = p.id
WHERE meta_key = 'TYPE' AND meta_value = 'EMBEDLY';

SELECT DISTINCT (post_type)
FROM wp_posts;

-- PARA OBTENR POSTS MEDIANTE LA BUSQUEDA
SELECT *
FROM wp_posts
WHERE post_type = 'post' AND post_status = 'publish'
      AND (post_name LIKE '%toconao%' OR wp_posts.post_content LIKE '%toconao%');


SELECT DISTINCT (post_title)
FROM wp_posts
WHERE post_parent = 0;

-- GET NOTICIAS PARA UNA SECCION
-- obtener todas las noticias  --el id 13560 aun esta operativo
-- ¿¿¿como lo asocio a una seccion?????

SELECT
  p.ID,
  p.post_author,
  p.post_date,
  p.post_date_gmt,
  p.post_content,
  p.post_title,
  p.post_excerpt,
  p.post_status,
  p.comment_status,
  p.ping_status,
  p.post_password,
  p.post_name,
  p.to_ping,
  p.pinged,
  p.post_modified,
  p.post_modified_gmt,
  p.post_content_filtered,
  p.post_parent,
  p.guid,
  p.menu_order,
  p.post_type,
  p.post_mime_type,
  p.comment_count,
  u.ID,
  u.user_login,
  u.user_nicename,
  u.user_email,
  u.user_status,
  u.display_name
FROM wp_posts p INNER JOIN wp_users u ON p.post_author = u.ID
WHERE post_status = 'publish'
      AND post_type = 'post'
      AND post_parent = 0;

-- DETALLE POST
-- obtener el post y todos sus recursos asociados
-- falta asociarlo con el usuario
SELECT
  ID,
  post_author,
  post_date,
  post_date_gmt,
  post_content,
  post_title,
  post_excerpt,
  post_status,
  comment_status,
  ping_status,
  post_password,
  post_name,
  to_ping,
  pinged,
  post_modified,
  post_modified_gmt,
  post_content_filtered,
  post_parent,
  guid,
  menu_order,
  post_type,
  post_mime_type,
  comment_count
FROM wp_posts
WHERE id = 2523
      AND post_status = 'post'
UNION
SELECT
  ID,
  post_author,
  post_date,
  post_date_gmt,
  post_content,
  post_title,
  post_excerpt,
  post_status,
  comment_status,
  ping_status,
  post_password,
  post_name,
  to_ping,
  pinged,
  post_modified,
  post_modified_gmt,
  post_content_filtered,
  post_parent,
  guid,
  menu_order,
  post_type,
  post_mime_type,
  comment_count
FROM wp_posts
WHERE post_parent = 2523
--  AND post_type = 'attachment'
-- AND ping_status = 'open';
-- AND post_status = 'publish'


-- como obtener la categoria (el término) de un post
SELECT ter.
       from wp_posts p INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
WHERE p.id = 2523
SELECT DATE(NOW());

SELECT STR_TO_DATE('01/12/2016', '%d/%m/%Y');
-- como obtener la url de embledy
SELECT p.post_content AS url
FROM wp_posts p INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
WHERE
  DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y')
  AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y')
  AND p.post_status = 'publish'
  AND p.post_type = 'post'
  AND ter.name = 'EXTERNAL'
LIMIT 5 OFFSET 0;
;

-- PRUEBAS PARA LEER URL EXTERNAS EMBLEDI
INSERT INTO wp_terms (name, slug, term_group) VALUES ('EXTERNAL', 'external', 0);

SELECT *
FROM wp_term;

INSERT INTO wp_term_taxonomy (term_id, taxonomy, parent, count, description)
VALUES (99, 'category', 0, 0, '');

SELECT *
FROM wp_term_taxonomy
WHERE term_id = 99;

-- post de prueba
16753
16754
16755

INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16753, 99, 0);
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16754, 99, 0);
INSERT INTO wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16755, 99, 0);

COMMIT;

SELECT *
FROM wp_term_relationships
WHERE term_taxonomy_id = 99;


SELECT
  p.ID,
  p.post_title,
  p.post_author,
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
  p.post_modified_gmt -- ,
-- ter.name AS category
FROM wp_posts p
-- INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
-- INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
-- INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
WHERE DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y')
      AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y')
      AND p.post_status = 'publish'
      AND p.post_type = 'post'

-- AND ter.name = 'EXTERNAL'
-- LIMIT :limit OFFSET :offset;
;


SELECT
  ID,
  user_login,
  user_nicename,
  user_email,
  display_name
FROM wp_users
WHERE ID = :idAuthor AND user_status = 0;
;

SELECT
  meta_id,
  post_id,
  meta_key,
  meta_value
FROM wp_postmeta
WHERE post_id = :idPost


CREATE TABLE MY_TABLE (
  post_author BIGINT UNSIGNED
);


0
1
4
6
7
8
9
10
11
12
13
14
;


SELECT post_date
FROM wp_posts
WHERE post_author = 1
ORDER BY post_date ASC


SELECT
  meta_id    AS id,
  post_id    AS idPost,
  meta_key   AS meta_KEY,
  meta_value AS VALUE
FROM wp_postmeta
WHERE post_id = :idPost

SELECT
  DISTINCT ter.name
FROM wp_term_taxonomy tax
  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
WHERE
AND tax.taxonomy = 'category'
-- AND ter.name = 'EXTERNO'
;

SELECT p.ID AS id
FROM wp_posts p INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
WHERE
  DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y') AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y')
  AND p.post_status = 'publish' AND p.post_type = 'post' AND tax.taxonomy = 'category' AND ter.name = :category
ORDER BY p.post_date DESC
LIMIT :limit OFFSET :offset;


SELECT
  p.ID                AS id,
  p.post_title        AS title,
  p.post_author       AS id_author,
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
  ter.name            AS category,
  user.ID             AS id_author,
  user.user_login     AS login,
  user.user_nicename  AS nicename,
  user.user_email     AS email,
  user.display_name
FROM wp_posts p
  LEFT JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
  LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
  LEFT JOIN wp_terms ter ON ter.term_id = tax.term_id
  INNER JOIN wp_users user ON p.post_author = user.ID
WHERE p.post_parent IN (
  SELECT p.ID AS id
  FROM wp_posts p INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id)
    INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
    INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
  WHERE
    DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y') AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y')
    AND p.post_status = 'publish' AND p.post_type = 'post' AND tax.taxonomy = 'category' AND ter.name = :category
  ORDER BY p.post_date DESC

)
      AND p.post_type = 'attachment'
ORDER BY p.post_date DESC
LIMIT :limit OFFSET :offset;


CALL sp_select_post_meta_from_category("02/03/2016", "02/03/2017", 10, 0, "OPINION");
CALL sp_select_post_from_category("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS");
CALL sp_select_resources_from_category("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS");

CALL sp_select_post_from_author("02/03/2016", "02/03/2017", 10, 0, 4);
CALL sp_select_resources_from_author("02/03/2016", "02/03/2017", 10, 0, 4);
CALL sp_select_post_meta_from_author("02/03/2016", "02/03/2017", 10, 0, 4);

CALL sp_select_post_from_id(16649);
CALL sp_select_resources_from_id(16644);
CALL sp_select_post_meta_from_id(16673);

CALL sp_select_post_from_search(10, 0, 'liceo');
CALL sp_select_resources_from_search(10, 0, 'liceo');
CALL sp_select_post_meta_from_search(10, 0, 'liceo');


SELECT *
FROM wp_posts
WHERE id = 16644;
SELECT *
FROM wp_posts
WHERE id = 16649;
