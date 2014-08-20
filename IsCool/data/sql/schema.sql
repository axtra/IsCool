CREATE TABLE emdi_administracion (adm_id INT UNIQUE AUTO_INCREMENT, adm_habilitar_nota1 TINYINT(1), adm_habilitar_nota2 TINYINT(1), adm_habilitar_nota3 TINYINT(1), adm_habilitar_nota4 TINYINT(1), adm_habilitar_nota5 TINYINT(1), adm_habilitar_nota6 TINYINT(1), adm_habilitar_nota7 TINYINT(1), adm_habilitar_nota8 TINYINT(1), adm_habilitar_nota9 TINYINT(1), adm_habilitar_nota10 TINYINT(1), adm_habilitar_nota11 TINYINT(1), adm_habilitar_nota12 TINYINT(1), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(adm_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_estudiante (est_id INT UNIQUE AUTO_INCREMENT, est_nombres VARCHAR(255), est_apellidos VARCHAR(255), est_cedula VARCHAR(10), est_fecha_nacimiento DATE, est_email_estudiante VARCHAR(100), est_house VARCHAR(15), est_nombre_representante VARCHAR(120), est_telf_repr_casa VARCHAR(10), est_telf_repr_trabajo VARCHAR(45), est_telf_repr_celular VARCHAR(10), est_email_representante VARCHAR(60), est_login_representante VARCHAR(60) NOT NULL, est_pass_representante VARCHAR(10) NOT NULL, gra_id INT NOT NULL, sf_guard_user_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX gra_id_idx (gra_id), INDEX sf_guard_user_id_idx (sf_guard_user_id), PRIMARY KEY(est_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_grado (gra_id INT UNIQUE AUTO_INCREMENT, gra_nombre VARCHAR(40) NOT NULL, gra_nombre_corto VARCHAR(5), pro_id INT NOT NULL, INDEX pro_id_idx (pro_id), PRIMARY KEY(gra_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_materia (mat_id INT UNIQUE AUTO_INCREMENT, mat_nombre VARCHAR(60) NOT NULL, PRIMARY KEY(mat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_materia_x_grado (mxg_id INT AUTO_INCREMENT, gra_id INT NOT NULL, mat_id INT NOT NULL, pro_id INT NOT NULL, INDEX gra_id_idx (gra_id), INDEX mat_id_idx (mat_id), INDEX pro_id_idx (pro_id), PRIMARY KEY(mxg_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_nota (not_id INT UNIQUE AUTO_INCREMENT, not_codigo_parcial VARCHAR(4) NOT NULL, not_nota INT NOT NULL, mat_id INT NOT NULL, pro_id INT NOT NULL, est_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX mat_id_idx (mat_id), INDEX est_id_idx (est_id), PRIMARY KEY(not_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE emdi_profesor (pro_id INT UNIQUE AUTO_INCREMENT, pro_nombres VARCHAR(60) NOT NULL, pro_apellidos VARCHAR(60) NOT NULL, pro_cedula VARCHAR(10), pro_email VARCHAR(100), pro_telf_casa VARCHAR(45), pro_telf_celular VARCHAR(45), pro_login VARCHAR(60), pro_pass VARCHAR(10) NOT NULL, pro_fecha_nacimiento DATE, pro_house VARCHAR(15), sf_guard_user_id BIGINT, INDEX sf_guard_user_id_idx (sf_guard_user_id), PRIMARY KEY(pro_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ENGINE = InnoDB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 ENGINE = InnoDB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE emdi_estudiante ADD CONSTRAINT emdi_estudiante_sf_guard_user_id_sf_guard_user_id FOREIGN KEY (sf_guard_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE emdi_estudiante ADD CONSTRAINT emdi_estudiante_gra_id_emdi_grado_gra_id FOREIGN KEY (gra_id) REFERENCES emdi_grado(gra_id);
ALTER TABLE emdi_grado ADD CONSTRAINT emdi_grado_pro_id_emdi_profesor_pro_id FOREIGN KEY (pro_id) REFERENCES emdi_profesor(pro_id);
ALTER TABLE emdi_materia_x_grado ADD CONSTRAINT emdi_materia_x_grado_pro_id_emdi_profesor_pro_id FOREIGN KEY (pro_id) REFERENCES emdi_profesor(pro_id);
ALTER TABLE emdi_materia_x_grado ADD CONSTRAINT emdi_materia_x_grado_mat_id_emdi_materia_mat_id FOREIGN KEY (mat_id) REFERENCES emdi_materia(mat_id);
ALTER TABLE emdi_materia_x_grado ADD CONSTRAINT emdi_materia_x_grado_gra_id_emdi_grado_gra_id FOREIGN KEY (gra_id) REFERENCES emdi_grado(gra_id);
ALTER TABLE emdi_nota ADD CONSTRAINT emdi_nota_mat_id_emdi_materia_mat_id FOREIGN KEY (mat_id) REFERENCES emdi_materia(mat_id);
ALTER TABLE emdi_nota ADD CONSTRAINT emdi_nota_est_id_emdi_estudiante_est_id FOREIGN KEY (est_id) REFERENCES emdi_estudiante(est_id);
ALTER TABLE emdi_profesor ADD CONSTRAINT emdi_profesor_sf_guard_user_id_sf_guard_user_id FOREIGN KEY (sf_guard_user_id) REFERENCES sf_guard_user(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
