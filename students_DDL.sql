use database_project;

CREATE TABLE students_rmp (
	student_id int AUTO_INCREMENT,
	# attributes
	fName varchar(50) NOT NULL,
    lName varchar(50) NOT NULL,
    expected_grad year DEFAULT NULL,
    email_addr varchar(100) NOT NULL,
    # references
    school_id int,
    prof_rating_id int,
    # foreign key(s)
    FOREIGN KEY(school_id) REFERENCES schools(school_id),
    FOREIGN KEY(prof_rating_id) REFERENCES professor_ratings(prof_rating_id),
    # primary key
    PRIMARY KEY(student_id)
);

# constraints