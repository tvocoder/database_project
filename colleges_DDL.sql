use database_project;

CREATE TABLE colleges (
	college_id int AUTO_INCREMENT,
    # attributes
    college_name varchar(255) NOT NULL,
    # primary key
    PRIMARY KEY(college_id)
);