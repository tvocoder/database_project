use database_project;

CREATE TABLE courses (
	course_id int AUTO_INCREMENT,
    # attributes
    term varchar(255) NOT NULL,
    session_type varchar(255) NOT NULL,
    subject_type varchar(255) NOT NULL,
	course_no varchar(4) NOT NULL,
	section_no varchar(2) NOT NULL,
    course_name varchar(255) NOT NULL,
    course_career varchar(255) NOT NULL,
    # references
    staff_id int,
    # foreign key(s)
    FOREIGN KEY(staff_id) REFERENCES faculty(staff_id),
    # primary key
    PRIMARY KEY(course_id)
);