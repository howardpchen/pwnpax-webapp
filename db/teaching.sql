-- Run this line separately
create database teaching;

-- Run these two lines separately
create user teaching with encrypted password '1$This@strongP@ssword?';
grant all privileges on database teaching to teaching;

-- Now, login as the user 'teaching' and run this remaining entire block
-- if using PhpPgAdmin, don't forget to uncheck 'Paginate results'
START TRANSACTION;

CREATE TABLE loginmember (
  traineeid varchar(11) NOT NULL,
  username varchar(25) NOT NULL,
  passwordhash text NOT NULL
);

INSERT INTO loginmember (traineeid, username, passwordhash) VALUES
('69292', 'darcher17', '468cf6ed6c70b740f0dca820313b89fe4be68b88cd06bbf6f58ab7df33321de1'),
('90435', 'csmith19', 'a9f5b9b343bd78c563a97f875bc9272b2c3f9a25f2e8f749915b397892dca3ab'),
('95671', 'hchen21', '5ee42be7dd6cdfca6379edcaf5e360533fb2bee54ef4af6d7b2ff18b5a305e15'),
('99999', 'guest', '2055ddd818846a0f31b6aaded71968dfa154d010a90ddd84b9695c8c85612fac');

CREATE TABLE residentiddefinition (
  traineeid varchar(11) NOT NULL,
  firstname varchar(25) NOT NULL,
  middlename varchar(25) DEFAULT '',
  lastname varchar(25) NOT NULL,
  iscurrenttrainee char(1) NOT NULL DEFAULT 'N'
);

INSERT INTO residentiddefinition (traineeid, firstname, middlename, lastname, iscurrenttrainee) VALUES
('69292', 'Darlene', '', 'Archer', 'Y'),
('90435', 'Clayton', '', 'Smith', 'Y'),
('95671', 'Harry', '', 'Chien', 'Y'),
('99999', 'Guest', '', 'Resident', 'Y');

CREATE TABLE teachingfiledata (
  category varchar(25) NOT NULL,
  caseuuid varchar(64) NOT NULL,
  description varchar(128) NOT NULL,
  notes varchar(128) NOT NULL
);

INSERT INTO teachingfiledata (category, caseuuid, description, notes) VALUES
('Glioblastoma', '31b546f9-89b5aab5-a94ae131-8b595e18-2ca46cf7', 'Case 3', 'TCGA-02-0006'),
('Lung Cancer', '61d93907-fe195778-f9f673f8-73a00911-4d7b66e2', 'Case 1', 'LIDC-IDRI-0013'),
('Glioblastoma', '6c45824d-1f0896f3-ee7021e3-d76cfed0-ffc188df', 'Case 2', 'TCGA-02-0009'),
('Lung Cancer', '78872b16-54d854fe-e3620134-253a576f-e49acda0', 'Case 4', 'LIDC-IDRI-0016'),
('Lung Cancer', 'b6ecfca2-fc5b6d38-8a2fa819-0b3639bc-559bea7c', 'Case 3', 'LIDC-IDRI-0014'),
('Glioblastoma', 'cb75889b-5abcf586-f1b3207f-b0b6d70d-afd6789f', 'Case 1', 'TCGA-02-0046'),
('Lung Cancer', 'd517b071-fc9e5886-c14c9fa8-2a5b82bb-9154439f', 'Case 2', 'LIDC-IDRI-0015');

ALTER TABLE loginmember
  ADD PRIMARY KEY (traineeid);

ALTER TABLE residentiddefinition
  ADD PRIMARY KEY (traineeid);

ALTER TABLE teachingfiledata
  ADD PRIMARY KEY (caseuuid);

COMMIT;
