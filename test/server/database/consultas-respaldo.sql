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

11, NOTICIAS, noticias
22, ANTOFAGASTA ONLINE, antofagasta-online
23, ATACAMA ONLINE, atacama-online
24, LA SERENA - COQUIMBO ONLINE, la-serena-coquimbo-online

;
CALL sp_select_post_from_category('13/12/2016', '13/12/2016', 10, 0, '24,23');

SELECT *
FROM wp_term_taxonomy
WHERE term_taxonomy_id IN (11, 12)

-- NOTICIAS
14906
14862
14858
14854
14850
14814

-- ATACAMA ONLINE
14906
14862
14858
14854
14850
14814

-- LA SERENA - COQUIMBO ONLINE
14906
14845
14842
14833
14818
14811;

SELECT
  meta_id    AS id,
  post_id    AS id_post,
  meta_key,
  meta_value AS value
FROM wp_postmeta
  INNER JOIN (SELECT p.ID AS id
              FROM wp_posts p INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id
                INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                INNER JOIN wp_users u ON p.post_author = u.ID
              WHERE DATE(p.post_date) >= STR_TO_DATE('13/12/2016', '%d/%m/%Y') AND
                    DATE(p.post_date) <= STR_TO_DATE('13/12/2016', '%d/%m/%Y') AND p.post_status = 'publish' AND
                    p.post_type = 'post' AND tax.taxonomy = 'category' AND tax.term_taxonomy_id IN (24, 23)
              GROUP BY p.ID
              HAVING count(tax.term_taxonomy_id) = LENGTH('24,23') - LENGTH(REPLACE('24,23', ',', '')) + 1
              ORDER BY p.post_date DESC
              LIMIT 10 OFFSET 0) AS temporary_table ON temporary_table.id = post_id
WHERE meta_key IN (' OPINION - AUTOR ', ' OPINION - TWITTER ', ' OPINION - CARGO ', '_thumbnail_id');

CALL sp_select_post_meta_from_category('13/12/2016', '13/12/2016', 10, 0, '24,23');
CALL sp_select_resources_from_category('13/12/2016', '13/12/2016', 10, 0, '24,23');
CALL sp_select_post_tag_from_category('13/12/2016', '13/12/2016', 10, 0, '11');
CALL sp_select_categories_from_category('13/12/2016', '13/12/2016', 10, 0, '11,23');

CALL sp_select_post_from_author("13/12/2016", "13/12/2016", 10, 0, 6);
CALL sp_select_resources_from_author("13/12/2016", "13/12/2016", 10, 0, 6);
CALL sp_select_post_meta_from_author("02/03/2016", "02/03/2017", 10, 0, 4);
CALL sp_select_post_tag_from_author("13/12/2016", "13/12/2016", 10, 0, 6);
CALL sp_select_categories_from_author("13/12/2016", "13/12/2016", 10, 0, 6);

CALL sp_select_post_from_id(16649);
CALL sp_select_resources_from_id(16644);
CALL sp_select_post_meta_from_id(16673);
CALL sp_select_post_tag_from_id(14850);
CALL sp_select_categories_from_id(14850);

CALL sp_select_post_from_search(10, 0, 'liceo');
CALL sp_select_resources_from_search(10, 0, 'liceo');
CALL sp_select_post_meta_from_search(10, 0, 'liceo');
CALL sp_select_post_tag_from_search(10, 0, 'La Gratuidad 2017 es una muy buena noticia para mile');
CALL sp_select_categories_from_search(10, 0, 'La Gratuidad 2017 es una muy buena noticia para miles');

CALL sp_select_post_from_tag(10, 0, 28);
CALL sp_select_resources_from_tag(10, 0, 28);
CALL sp_select_post_meta_from_tag(10, 0, 28);
CALL sp_select_post_tag_from_tag(10, 0, 28);
CALL sp_select_categories_from_tag(10, 0, 28);


SELECT
  term_id,
  count(term_id) contador
FROM wp_term_taxonomy
WHERE taxonomy = 'post_tag'
GROUP BY term_id
HAVING contador = 1;


SELECT *
FROM wp_posts
WHERE id = 16644;
SELECT *
FROM wp_posts
WHERE id = 16649;

-- post de opinion
INSERT INTO made4832_radio.wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES
  (4, '2017-02-17 10:42:59', '2017-02-17 10:43:01', 'to opino que ....blab lalblab abllaa', 'Opnion sobre algo', ' ',
      'publish', 'open', 'open', ' ', '/la-ruta-de-la-opinion', ' ', ' ', '2017-02-17 10:44:09', '2017-02-17 10:44:12',
                                                                ' ', 0, 'madero.com', 0, 'post', '', 0);
-- posts de embadly
INSERT INTO made4832_radio.wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (4, '2017-02-12 15:03:55', '2017-02-12 18:03:58', 'https://ubuntulife.files.wordpress.com/2010/03/montaje.jpg',
           'EXTERNAL imagen', ' ', 'publish', 'open', 'open', '', '/la-ruta-del-post-16755', ' ', ' ',
                                                                                             '2017-02-10 18:03:58',
                                                                                             '2017-02-10 18:03:58', ' ',
                                                                                             0, 'maderofm.com/?p=16755',
                                                                                             0, 'post', 'audio/mpeg',
        0);
INSERT INTO made4832_radio.wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES
  (4, '2017-02-11 15:03:55', '2017-02-11 18:03:58', 'https://www.youtube.com/watch?v=0VJm0mi7aUc', 'EXTERNAL youtube',
      ' ', 'publish', 'open', 'open', '', '/la-ruta-del-post-16754', ' ', ' ', '2017-02-10 18:03:58',
                                                                     '2017-02-10 18:03:58', ' ', 0,
                                                                     'maderofm.com/?p=16754', 0, 'post', 'image/jpeg',
   0);
INSERT INTO made4832_radio.wp_posts (post_author, post_date, post_date_gmt, post_content, post_title, post_excerpt, post_status, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_content_filtered, post_parent, guid, menu_order, post_type, post_mime_type, comment_count)
VALUES (4, '2017-02-10 15:10:42', '2017-02-10 15:10:44',
           'tp://www.latercera.com/noticia/inflacion-registro-aumento-05-enero/', 'EXTERNAL la tercera', ' ', 'publish',
           'open', 'open', '', '/la-ruta-del-post-16753', ' ', ' ', '2017-02-10 15:11:22', '2017-02-10 15:11:24', ' ',
                                                          0, 'maderofm.com/?p=16753', 0, 'post', 'audio/mpeg', 0);

-- config META, COLOCAR el ID del pOST de opinion
INSERT INTO made4832_radio.wp_postmeta (post_id, meta_key, meta_value) VALUES (16756, 'OPINION-CARGO', 'un cargo');
INSERT INTO made4832_radio.wp_postmeta (post_id, meta_key, meta_value) VALUES (16756, 'OPINION-TWITTER', 'un twitter');
INSERT INTO made4832_radio.wp_postmeta (post_id, meta_key, meta_value) VALUES (16756, 'OPINION-AUTOR', 'un opinologo');

-- config categorias
INSERT INTO made4832_radio.wp_terms (name, slug) VALUES ('EXTERNO', 'externo');
INSERT INTO made4832_radio.wp_terms (name, slug) VALUES ('OPINION', 'opinion');

-- colocar los ids de las categorias insertadoas
-- embedly
INSERT INTO made4832_radio.wp_term_taxonomy (term_id, taxonomy, description, parent, count)
VALUES (99, 'category', '', 0, 0);
-- opinion
INSERT INTO made4832_radio.wp_term_taxonomy (term_id, taxonomy, description, parent, count)
VALUES (100, 'category', ' ', 0, 0);

-- Colocar los ids de los post en ObjectId y el id de wp_term_taxonomy
-- post de embedly
INSERT INTO made4832_radio.wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16753, 99, 0);
INSERT INTO made4832_radio.wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16754, 99, 0);
INSERT INTO made4832_radio.wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16755, 99, 0);
-- post de opinion
INSERT INTO made4832_radio.wp_term_relationships (object_id, term_taxonomy_id, term_order) VALUES (16756, 100, 0);


SELECT DISTINCT wp_term_relationships.object_id
FROM wp_term_taxonomy
  INNER JOIN wp_terms ON wp_term_taxonomy.term_id = wp_terms.term_id
  INNER JOIN wp_term_relationships
WHERE taxonomy = 'post_tag';

SELECT *
FROM wp_term_relationships;


SELECT *
FROM wp_posts

WHERE ID = 3220


SET @ SQL = 'SELECT';
SET @sql = CONCAT(@sql, '  p.ID                AS id,');
SET @sql = CONCAT(@sql, '  p.post_title        AS title,')
SET @ SQL = CONCAT(@ SQL, '  p.post_content      AS content,');
SET @sql = CONCAT(@sql, '  p.post_date         AS date,');
SET @sql = CONCAT(@sql, '  p.post_date_gmt     AS date_gmt,');
SET @sql = CONCAT(@sql, '  p.post_status       AS status,');
SET @sql = CONCAT(@sql, '  p.post_type         AS type,');
SET @sql = CONCAT(@sql, '  p.post_name         AS name,');
SET @sql = CONCAT(@sql, '  p.post_parent       AS id_parent,');
SET @sql = CONCAT(@sql, '  p.guid              AS guid,');
SET @sql = CONCAT(@sql, '  p.post_mime_type    AS mime_type,');
SET @sql = CONCAT(@sql, '  p.post_modified     AS modified,');
SET @sql = CONCAT(@sql, '  p.post_modified_gmt AS modified_gmt,');
SET @sql = CONCAT(@sql, '  u.ID                AS id_author,');
SET @sql = CONCAT(@sql, '  u.user_login        AS login,');
SET @sql = CONCAT(@sql, '  u.user_nicename     AS nicename,');
SET @sql = CONCAT(@sql, '  u.user_email        AS email,');
SET @sql = CONCAT(@sql, '  u.display_name');
SET @sql = CONCAT(@sql, 'FROM wp_posts p');
SET @sql = CONCAT(@sql, '  INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id');
SET @sql = CONCAT(@sql, '  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id');
SET @sql = CONCAT(@sql, '  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id');
SET @sql = CONCAT(@sql, '  INNER JOIN wp_users u ON p.post_author = u.ID');
SET @sql = CONCAT(@sql, 'WHERE DATE(p.post_date) >= STR_TO_DATE(', p_start_date, ', \'%d/%m/%Y\')');
SET @sql = CONCAT(@sql, '      AND DATE(p.post_date) <= STR_TO_DATE(', p_end_date, ', \'%d/%m/%Y\')');
SET @sql = CONCAT(@sql, '      AND p.post_status = \'publish\'');
SET @sql = CONCAT(@sql, '      AND p.post_type = \'post\'');
SET @sql = CONCAT(@sql, '      AND tax.taxonomy = \'category\'');
SET @sql = CONCAT(@sql, '      AND ter.name IN (', p_categories, ')');
SET @sql = CONCAT(@sql, 'GROUP BY');
SET @sql = CONCAT(@sql, '  p.ID,');
SET @sql = CONCAT(@sql, '  p.post_title,');
SET @sql = CONCAT(@sql, '  p.post_content,');
SET @sql = CONCAT(@sql, '  p.post_date,');
SET @sql = CONCAT(@sql, '  p.post_date_gmt,');
SET @sql = CONCAT(@sql, '  p.post_status,');
SET @sql = CONCAT(@sql, '  p.post_type,');
SET @sql = CONCAT(@sql, '  p.post_name,');
SET @sql = CONCAT(@sql, '  p.post_parent,');
SET @sql = CONCAT(@sql, '  p.guid,');
SET @sql = CONCAT(@sql, '  p.post_mime_type,');
SET @sql = CONCAT(@sql, '  p.post_modified,');
SET @sql = CONCAT(@sql, '  p.post_modified_gmt,');
SET @sql = CONCAT(@sql, '  u.ID,');
SET @sql = CONCAT(@sql, '  u.user_login,');
SET @sql = CONCAT(@sql, '  u.user_nicename,');
SET @sql = CONCAT(@sql, '  u.user_email,');
SET @sql = CONCAT(@sql, '  u.display_name');
SET @sql = CONCAT(@sql, 'HAVING count(tax.term_taxonomy_id) = LENGTH(', p_categories, ') - LENGTH(REPLACE(,'
                  p_categories, ', ', ', '')) + 1');
SET @sql = CONCAT(@sql, 'ORDER BY p.post_date DESC');
SET @sql = CONCAT(@sql, 'LIMIT ', p_limit, ' OFFSET ', p_offset);


SELECT
  temporary_table.id AS id_post,
  terms.term_id      AS id_category,
  terms.name         AS name
FROM wp_term_relationships term_rel
  INNER JOIN (SELECT DISTINCT p.ID AS id
              FROM wp_posts p
                INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id
                INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id
                INNER JOIN wp_terms ter ON ter.term_id = tax.term_id
              WHERE DATE(p.post_date) >= STR_TO_DATE(:p_start_date, '%d/%m/%Y')
                    AND DATE(p.post_date) <= STR_TO_DATE(:p_end_date, '%d/%m/%Y')
                    AND p.post_status = 'publish'
                    AND p.post_type = 'post'
                    AND tax.taxonomy = 'category'
                    AND ter.name = :p_category
              ORDER BY p.post_date DESC
              LIMIT :p_limit OFFSET :p_offset) AS temporary_table ON temporary_table.id = term_rel.object_id
  INNER JOIN wp_term_taxonomy term_tax ON term_tax.term_taxonomy_id = term_rel.term_taxonomy_id
  INNER JOIN wp_terms terms ON terms.term_id = term_tax.term_id
WHERE term_tax.taxonomy = 'category';

-- 15905
16709
16706
16641
16636
16633
16621
16614
16609
16528
16379


SELECT LENGTH('ATACAMA ONLINE') - LENGTH(REPLACE('ATACAMA ONLINE', ',', '')) + 1;


SELECT REPLACE('asd,', ',', '');


SELECT now()
FROM wp_posts
WHERE find_in_set('1', '1,2,3,4');

SELECT find_in_set('ATACAMA ONLINE', 'ATACAMA ONLINE,ANTOFAGASTA ONLINE');


DROP PROCEDURE IF EXISTS `GetFruits`;
DELIMITER $$

CREATE PROCEDURE GetFruits(IN fruitArray VARCHAR(255))
  BEGIN

    SET @sql = CONCAT('SELECT * FROM wp_posts WHERE id IN (', fruitArray, ')');

    SET @sql = CONCAT(@sql, ' ORDER BY ID desc');


    PREPARE stmt FROM @sql;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

  END
$$

DELIMITER ;


CALL GetFruits('14906,14907,14908');


BEGIN

SET @stmt = 'SELECT';
SET @stmt = CONCAT(@stmt, '  p.ID                AS id, ');
SET @stmt = CONCAT(@stmt, '  p.post_title        AS title, ');
SET @stmt = CONCAT(@stmt, '  p.post_content      AS content, ');
SET @stmt = CONCAT(@stmt, '  p.post_date         AS date, ');
SET @stmt = CONCAT(@stmt, '  p.post_date_gmt     AS date_gmt, ');
SET @stmt = CONCAT(@stmt, '  p.post_status       AS status, ');
SET @stmt = CONCAT(@stmt, '  p.post_type         AS type, ');
SET @stmt = CONCAT(@stmt, '  p.post_name         AS name, ');
SET @stmt = CONCAT(@stmt, '  p.post_parent       AS id_parent, ');
SET @stmt = CONCAT(@stmt, '  p.guid              AS guid, ');
SET @stmt = CONCAT(@stmt, '  p.post_mime_type    AS mime_type, ');
SET @stmt = CONCAT(@stmt, '  p.post_modified     AS modified, ');
SET @stmt = CONCAT(@stmt, '  p.post_modified_gmt AS modified_gmt, ');
SET @stmt = CONCAT(@stmt, '  u.ID                AS id_author, ');
SET @stmt = CONCAT(@stmt, '  u.user_login        AS login, ');
SET @stmt = CONCAT(@stmt, '  u.user_nicename     AS nicename, ');
SET @stmt = CONCAT(@stmt, '  u.user_email        AS email, ');
SET @stmt = CONCAT(@stmt, '  u.display_name ');
SET @stmt = CONCAT(@stmt, 'FROM wp_posts p ');
SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_term_relationships rel ON p.ID = rel.object_id ');
SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ');
SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id ');
SET @stmt = CONCAT(@stmt, '  INNER JOIN wp_users u ON p.post_author = u.ID ');
SET @stmt = CONCAT(@stmt, 'WHERE DATE(p.post_date) >= STR_TO_DATE(', p_start_date, ', \'%d/%m/%Y\') ');
SET @stmt = CONCAT(@stmt, '      AND DATE(p.post_date) <= STR_TO_DATE(', p_end_date, ', \'%d/%m/%Y\') ');
SET @stmt = CONCAT(@stmt, '      AND p.post_status = \'publish\' ');
SET @stmt = CONCAT(@stmt, '      AND p.post_type = \'post\'  ');
SET @stmt = CONCAT(@stmt, '      AND tax.taxonomy = \'category\' ');
SET @stmt = CONCAT(@stmt, '      AND ter.name IN (', p_categories, ')  ');
SET @stmt = CONCAT(@stmt, 'GROUP BY ');
SET @stmt = CONCAT(@stmt, '  p.ID, ');
SET @stmt = CONCAT(@stmt, '  p.post_title, ');
SET @stmt = CONCAT(@stmt, '  p.post_content, ');
SET @stmt = CONCAT(@stmt, '  p.post_date, ');
SET @stmt = CONCAT(@stmt, '  p.post_date_gmt, ');
SET @stmt = CONCAT(@stmt, '  p.post_status, ');
SET @stmt = CONCAT(@stmt, '  p.post_type, ');
SET @stmt = CONCAT(@stmt, '  p.post_name, ');
SET @stmt = CONCAT(@stmt, '  p.post_parent, ');
SET @stmt = CONCAT(@stmt, '  p.guid, ');
SET @stmt = CONCAT(@stmt, '  p.post_mime_type, ');
SET @stmt = CONCAT(@stmt, '  p.post_modified, ');
SET @stmt = CONCAT(@stmt, '  p.post_modified_gmt, ');
SET @stmt = CONCAT(@stmt, '  u.ID, ');
SET @stmt = CONCAT(@stmt, '  u.user_login, ');
SET @stmt = CONCAT(@stmt, '  u.user_nicename, ');
SET @stmt = CONCAT(@stmt, '  u.user_email, ');
SET @stmt = CONCAT(@stmt, '  u.display_name ');
SET @stmt = CONCAT(@stmt, 'HAVING count(tax.term_taxonomy_id) = LENGTH(', p_categories, ') - LENGTH(REPLACE(',
                   p_categories, ', ', ', '')) + 1 ');
SET @stmt = CONCAT(@stmt, 'ORDER BY p.post_date DESC ');
SET @stmt = CONCAT(@stmt, 'LIMIT ', p_limit, ' OFFSET ', p_offset);

PREPARE stmt FROM @stmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END$$
