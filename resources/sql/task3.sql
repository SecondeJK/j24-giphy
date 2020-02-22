DELIMITER $$
DROP PROCEDURE IF EXISTS  traverse_records;

CREATE PROCEDURE traverse_records()
BEGIN
    DECLARE media_id   VARCHAR(10);
    DECLARE type VARCHAR(255);
    DECLARE id VARCHAR(255);
    DECLARE slug VARCHAR(255);
    DECLARE url VARCHAR(255);
    DECLARE bitly_url VARCHAR(255);
    DECLARE embed_url VARCHAR(255);
    DECLARE username VARCHAR(255);
    DECLARE source VARCHAR(255);
    DECLARE content_url VARCHAR(255);
    DECLARE source_post_url VARCHAR(255);
    DECLARE update_datetime VARCHAR(255);
    DECLARE create_datetime VARCHAR(255);
    DECLARE import_datetime VARCHAR(255);
    DECLARE trending_datetime VARCHAR(255);
    DECLARE title VARCHAR(255);

    DECLARE exit_loop BOOLEAN;
    DECLARE media_cursor CURSOR FOR
        SELECT * FROM media;
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET exit_loop = TRUE;

    DROP TABLE IF EXISTS media2;
    CREATE TABLE media2 LIKE media;

    OPEN media_cursor;
    media_loop: LOOP
        FETCH  media_cursor INTO media_id, type, id, slug, url, bitly_url, embed_url, username, source, content_url,
            source_post_url, update_datetime, create_datetime, import_datetime, trending_datetime, title;
        IF exit_loop THEN
            CLOSE media_cursor;
            LEAVE media_loop;
        END IF;
        -- This is copying the whole table but the task does say specifically just the title. Might as well do all the data.
        INSERT INTO media2 (media_id, type, id, slug, url, bitly_url, embed_url, username, source, content_url, source_post_url, update_datetime, create_datetime, import_datetime, trending_datetime, title) VALUES
        (
         media_id, type, id, slug, url, bitly_url, embed_url, username, source, content_url, source_post_url, update_datetime,
         create_datetime, import_datetime, trending_datetime, CONCAT(title, '_', now())
        );

    END LOOP media_loop;
END $$;
DELIMITER ;

-- gimme some data yall
call traverse_records();
