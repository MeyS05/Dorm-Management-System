# Dorm Management System

A web-based application developed using **PHP, MySQL, HTML, and CSS** as part of the Database Management Systems course (2025–2026) at the University of Messina.

## Overview

The system manages dormitory operations through a graphical interface, allowing users to manage students, staff, dormitories, rooms, facilities, and assignments.

## Features

- Add, delete, search, and view student records.
- Manage staff members and their assignments.
- Add and view rooms.
- View dormitories and facilities.
- Manage student-room assignments.
- View existing assignments.

## Database Design

The relational database consists of five main entities:

- **Student:** StudentID, FirstName, LastName, Gender, Email.
- **Staff:** StaffID, FirstName, LastName, Role, Email.
- **Dorm:** DormName, Capacity, Location, ContactNumber.
- **Room:** RoomCode, Floor, Capacity, RoomType.
- **Facility:** FacilityCode, Type, FacilityName.

The database models relationships between students and rooms, dormitories and rooms, dormitories and facilities, and staff and dormitories.

The schema follows **Third Normal Form (3NF)** and **Boyce–Codd Normal Form (BCNF)** principles.

The ER diagram is available in the `docs/` directory.

## Technologies

- PHP
- MySQL and SQL
- HTML and CSS
- phpMyAdmin

## Project Structure

- `php/` – Application source files (18 PHP files).
- `database/` – SQL database script.
- `stylesheet/` – CSS stylesheet.
- `docs/` – ER diagram.

## Running Locally

1. Start Apache and MySQL using XAMPP or MAMP.
2. Create the database through phpMyAdmin and import the SQL script.
3. Configure the database connection in `functions.php`.
4. Open the project through your local server.

## Academic Context

**Course:** Database Management Systems Mod. A  
**Institution:** University of Messina  
**Academic Year:** 2025–2026
