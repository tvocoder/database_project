use database_project;

CREATE TABLE staff_info (
	info_id int AUTO_INCREMENT,
    # attributes
	office_no varchar(50) NOT NULL,
    telephone_no varchar(50) NOT NULL,
    email_addr varchar(50) NOT NULL,
    website_link varchar(50) DEFAULT NULL,
    department_char bool NOT NULL,
    # primary key
    PRIMARY KEY(info_id)
);