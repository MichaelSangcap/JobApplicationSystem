CREATE TABLE job_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(15),
    position VARCHAR(255),
    resume TEXT,
    date_applied TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
