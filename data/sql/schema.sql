CREATE TABLE article (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, short_description VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, picture VARCHAR(255), is_published TINYINT(1) DEFAULT '0', published_at DATETIME NOT NULL, author_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX author_id_idx (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE article_keyword (article_id BIGINT, keyword_id BIGINT, PRIMARY KEY(article_id, keyword_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE comment (id BIGINT AUTO_INCREMENT, article_id BIGINT NOT NULL, parent_id BIGINT, author_id BIGINT NOT NULL, content TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX article_id_idx (article_id), INDEX author_id_idx (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE competition (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE competition_session (id BIGINT AUTO_INCREMENT, date DATE NOT NULL, competition_id BIGINT NOT NULL, INDEX competition_id_idx (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE competition_session_team (id BIGINT AUTO_INCREMENT, team_id BIGINT NOT NULL, competition_session_id BIGINT NOT NULL, INDEX team_id_idx (team_id), INDEX competition_session_id_idx (competition_session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE gallery (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE keyword (id BIGINT AUTO_INCREMENT, name VARCHAR(255) NOT NULL, reference VARCHAR(25), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE picture (id BIGINT AUTO_INCREMENT, name TEXT NOT NULL, description TEXT, gallery_id BIGINT NOT NULL, is_cover_gallery TINYINT(1) DEFAULT '0', INDEX gallery_id_idx (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE team (id BIGINT AUTO_INCREMENT, name TEXT NOT NULL, type VARCHAR(5), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE user_team (id BIGINT AUTO_INCREMENT, user_id BIGINT, team_id BIGINT, is_captain TINYINT(1), INDEX team_id_idx (team_id), INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, avatar VARCHAR(255), is_disponible TINYINT(1) DEFAULT '1', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = INNODB;
ALTER TABLE article ADD CONSTRAINT article_author_id_sf_guard_user_id FOREIGN KEY (author_id) REFERENCES sf_guard_user(id);
ALTER TABLE article_keyword ADD CONSTRAINT article_keyword_keyword_id_keyword_id FOREIGN KEY (keyword_id) REFERENCES keyword(id) ON DELETE CASCADE;
ALTER TABLE article_keyword ADD CONSTRAINT article_keyword_article_id_article_id FOREIGN KEY (article_id) REFERENCES article(id) ON DELETE CASCADE;
ALTER TABLE comment ADD CONSTRAINT comment_author_id_sf_guard_user_id FOREIGN KEY (author_id) REFERENCES sf_guard_user(id);
ALTER TABLE comment ADD CONSTRAINT comment_article_id_article_id FOREIGN KEY (article_id) REFERENCES article(id);
ALTER TABLE competition_session ADD CONSTRAINT competition_session_competition_id_competition_id FOREIGN KEY (competition_id) REFERENCES competition(id);
ALTER TABLE competition_session_team ADD CONSTRAINT competition_session_team_team_id_team_id FOREIGN KEY (team_id) REFERENCES team(id);
ALTER TABLE competition_session_team ADD CONSTRAINT ccci FOREIGN KEY (competition_session_id) REFERENCES competition_session(id);
ALTER TABLE picture ADD CONSTRAINT picture_gallery_id_gallery_id FOREIGN KEY (gallery_id) REFERENCES gallery(id) ON DELETE CASCADE;
ALTER TABLE user_team ADD CONSTRAINT user_team_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id);
ALTER TABLE user_team ADD CONSTRAINT user_team_team_id_team_id FOREIGN KEY (team_id) REFERENCES team(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
