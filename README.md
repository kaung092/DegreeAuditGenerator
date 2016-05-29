
## Synopsis

This web application generate student degree audit based on class information entered. 
The system currently in use at City College of New York does not create degree audit, which resulted in manual tasks for academic advisors and a excruciatingly long waiting time for students who just want to see their graduation status.

## How it works

This web application automates the manual processing of student degree audit by:
1. Parsing student class information and categorizing into Liberal Arts, EE core, Electives, etc.
2. Checking it against appropriate curriculum 
3. Obmitting classes that do not meet minimum grade requirement.
4. Highlighting currently enrolled classes.
5. Generating formatted degree audit in excel which can be downloaded.

This application is currenlty in use by advisors of Electrical Engineering department at City College of New York.

## Work in progress
1. Integrating more curriculums from different disciplines.
2. Creating user interface to customize curriculums (accessible by program advisors of each department)
3. Calculating QPA, and projected GPA etc.
