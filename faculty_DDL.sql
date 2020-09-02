use database_project;

CREATE TABLE faculty (
	staff_id int AUTO_INCREMENT,
    # attributes
    fName varchar(50) NOT NULL,
    lName varchar(50) NOT NULL,
    # references
    info_id int,
    profile_id int,
    department_id int,
    college_id int,
    course_id int,
    # unique key(s)
    CONSTRAINT UC_staff_member UNIQUE(staff_id, fName, lName),
    # foreign key(s)
    FOREIGN KEY(info_id) REFERENCES staff_info(info_id),
    FOREIGN KEY(profile_id) REFERENCES staff_profile(profile_id),
    FOREIGN KEY(department_id) REFERENCES departments(department_id),
    FOREIGN KEY(college_id) REFERENCES colleges(college_id),
    # primary key
    PRIMARY KEY(staff_id)
);