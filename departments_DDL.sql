use database_project;

CREATE TABLE departments (
	department_id int AUTO_INCREMENT,
    # attributes
    department_name varchar(255) NOT NULL,
    # references
    college_id int,
    # foreign key
    FOREIGN KEY(college_id) REFERENCES colleges(college_id),
    # primary key
    PRIMARY KEY(department_id)
)