use database_project;

CREATE TABLE staff_profile (
	profile_id int AUTO_INCREMENT,
    # attributes
    biography text NOT NULL,
    degrees text NOT NULL,
    courses_taught text NOT NULL,
    qualification text NOT NULL,
    more_info text DEFAULT NULL,
    # references
    # foreign key(s)
    # primary key
    PRIMARY KEY(profile_id)
);