# 2020-corporate-02
# PolyDo App
#### PolyDo is a personal and team productivity tool that allows for task management and collaboration. The app does not restrict to a set methodology (e.g. GTD, Frank Covey, etc.), and allows for individual and group task management.

Following are the features the app must implement, you are encouraged to be creative, as long as all of the requirements are met.


Feature: Tasks
    I want to create a new task
    I can enter task title, task description, task due date
    I want to edit an existing Task
    I want to  mark a task complete
    I can mark a task incomplete after marking it complete
    I want to delete a task
    I want to create sub-tasks
    Sub-tasks have the same features as a task, but cannot have sub-tasks


Feature: Lists
    I want to create new Lists
    I can enter list name, and description
    I want to edit existing Lists
    I want to delete Lists
    Deleting a list will not delete Tasks
    I want to assign Tasks to a List
    I want to select a List when creating or editing a Task


Feature: User Account
    I want to log in to the app
    I want to register for the app
    I want to log out of the app
    I want to manage my account
    I can manage personal information here, the level of complexity of this user story is up to the developer to decide


### Mandatory Technical Requirements


Application is expected to meet ALL of the following technical specifications:


* The Application must be a Web Application, no other implementations are qualified (e.g. Desktop Application)
* Application functionality must be implemented in: 
    * Node.js (latest version supported by the hosting platform preferred)
    * React.js and Bootstrap for the front-end 
* Application must be responsive

### Bonus Points
The following are not required, but your application gets bonus points if you take them into consideration. The order below does not indicate importance: 


* Local development environment is setup using Docker 
* Source code follows Node development standards and pass JS Lint
* Build and deployment process automated and repeatable
* Database implemented as NoSQL
* Backend implemented using Serverless technology (e.g. AWS Lambda, Azure Functions, or Google Firebase Functions)
* Implement login using oAuth providers, such as Google, Facebook, etc.
* Implement Unit Testing for backend and front end code (separately)
* Application backend performs well
* Front-end code is compiled and optimized for performance 
* Application passes all Google PageSpeed tests 
* Application uses a Google Material Design Bootstrap theme
* Application uses a CDN for the static assets
* Application is deployed to AWS, Azure, or Google Firebase
* Use JavaScript ES6
* Application security

## Technical Evaluation Process
1. You complete the app development
2. You share the code with us via a private git repository, or shared cloud drive (e.g. Google Drive) 
3. We will asses the code and test the app, based on the evaulation will proceed to next step
4. We will schedule a new meeting so you will present your work (code) 
5. You will present the application, focused on:
    *  The end-user functionality
    * Application architecture
    * The source code
    * How you have met the technical requirements, and if you have covered any of the bonus topics
    * How the application is currently deployed
    * Answering questions about your decision making.
