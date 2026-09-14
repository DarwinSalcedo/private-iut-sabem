
ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_academico tinyint not null;

ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_antiguedad tinyint not null;

ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_desempenho tinyint not null;

ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_mejoram_prof tinyint not null;

ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_cursos tinyint not null;

ALTER TABLE `tbl_asc_config_fecha_asc`
 ADD porc_condecor tinyint not null;

update tbl_asc_config_fecha_asc set porc_academico = 20, porc_antiguedad = 20, porc_desempenho = 20, porc_mejoram_prof = 20, porc_cursos = 16, porc_condecor = 4;