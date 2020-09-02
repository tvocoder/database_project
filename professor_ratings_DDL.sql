USE database_project;

CREATE TABLE professor_ratings (
	# attributes
    prof_rating_id int AUTO_INCREMENT,
    # criterias for posting a rating on ratemyprofessor
    fName varchar(50) NOT NULL,
    lName varchar(50) NOT NULL,
    post_date date NOT NULL,
    course_code varchar(10) NOT NULL,
    online_class bool NOT NULL,
    professor_rating int UNSIGNED NOT NULL,
    difficulty_level int UNSIGNED NOT NULL,
    take_again bool NOT NULL,
    for_credit bool NOT NULL,
    textbook_used bool NOT NULL,
    attendance_req bool NOT NULL,
    grade_received varchar(50) DEFAULT NULL,
    tag_1 varchar(50) DEFAULT NULL,
    tag_2 varchar(50) DEFAULT NULL,
    tag_3 varchar(50) DEFAULT NULL,
    student_comment text(350),
    # references
    # foreign key(s)
    # unique key(s)
    UNIQUE(fName, lName, course_code),
    # primary key
    PRIMARY KEY(prof_rating_id)
);

# constraints on what can be inserted into attributes (columns)
ALTER TABLE professor_ratings
ADD CONSTRAINT CHK_professor_rating CHECK (`professor_rating` IN (1, 2, 3, 4, 5));

ALTER TABLE professor_ratings
ADD CONSTRAINT CHK_difficulty_level CHECK (`difficulty_level` IN (1, 2, 3, 4, 5));

ALTER TABLE professor_ratings
ADD CONSTRAINT CHK_grade_received CHECK (`grade_received` IN ('A+', 'A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'D-', 'F', 'Drop/Withdrawal', 'Incomplete', 'Not sure yet', 'Rather not say', 'Audit/No Grade', NULL));

ALTER TABLE professor_ratings
ADD CONSTRAINT CHK_tag_1 CHECK (`tag_1` IN ('GIVES GOOD FEEDBACK', 'RESPECTED', 'LOTS OF HOMEWORK', 'ACCESSIBLE OUTSIDE CLASS', 'GET READY TO READ', 'PARTICIPATION MATTERS', 'SKIP CLASS? YOU WON\'T PASS', 'INSPIRATIONAL', 'GRADED BY FEW THINGS', 'TEST HEAVY', 'GROUP PROJECTS', 'CLEAR GRADING CRITERIA', 'HILARIOUS', 'BEWARE OF POP QUIZZES', 'AMAZING LECTURES', 'LECTURE HEAVY', 'CARING', 'EXTRA CREDIT', 'SO MANY PAPERS', 'TOUGH GRADER', NULL));

ALTER TABLE professor_ratings
ADD CONSTRAINT CHK_tag_2 CHECK (`tag_1` IN ('GIVES GOOD FEEDBACK', 'RESPECTED', 'LOTS OF HOMEWORK', 'ACCESSIBLE OUTSIDE CLASS', 'GET READY TO READ', 'PARTICIPATION MATTERS', 'SKIP CLASS? YOU WON\'T PASS', 'INSPIRATIONAL', 'GRADED BY FEW THINGS', 'TEST HEAVY', 'GROUP PROJECTS', 'CLEAR GRADING CRITERIA', 'HILARIOUS', 'BEWARE OF POP QUIZZES', 'AMAZING LECTURES', 'LECTURE HEAVY', 'CARING', 'EXTRA CREDIT', 'SO MANY PAPERS', 'TOUGH GRADER', NULL));

ALTER TABLE professor_ratings
ADD CONSTRAINT CHECK_tag_2 CHECK (`tag_1` IN ('GIVES GOOD FEEDBACK', 'RESPECTED', 'LOTS OF HOMEWORK', 'ACCESSIBLE OUTSIDE CLASS', 'GET READY TO READ', 'PARTICIPATION MATTERS', 'SKIP CLASS? YOU WON\'T PASS', 'INSPIRATIONAL', 'GRADED BY FEW THINGS', 'TEST HEAVY', 'GROUP PROJECTS', 'CLEAR GRADING CRITERIA', 'HILARIOUS', 'BEWARE OF POP QUIZZES', 'AMAZING LECTURES', 'LECTURE HEAVY', 'CARING', 'EXTRA CREDIT', 'SO MANY PAPERS', 'TOUGH GRADER', NULL));