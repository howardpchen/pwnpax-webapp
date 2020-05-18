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
  caseuuid varchar(1000) NOT NULL,
  description varchar(128) NOT NULL,
  notes varchar(128) NOT NULL
);

INSERT INTO teachingfiledata (category, caseuuid, description, notes) VALUES
('Glioblastoma', 'studyUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.339372202011004731829363267423&seriesUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.320679027608000687591928843096&objectUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.290231660349920502919014183860', 'Case 3', 'TCGA-02-0006'),
('Lung Cancer', 'studyUID=1.3.6.1.4.1.14519.5.2.1.8421.4009.308092408045167711117671108231&seriesUID=1.3.6.1.4.1.14519.5.2.1.8421.4009.148721140606055021653661934276&objectUID=1.3.6.1.4.1.14519.5.2.1.8421.4009.445297343480625496511480948334', 'Case 1', 'LIDC-IDRI-0013'),
('Glioblastoma', 'studyUID=1.3.6.1.4.1.14519.5.2.1.6279.6001.314138616411061948052843767346&seriesUID=1.3.6.1.4.1.14519.5.2.1.6279.6001.254176853278710432756285662989&objectUID=1.3.6.1.4.1.14519.5.2.1.6279.6001.666948053008973930044402463161', 'Case 2', 'TCGA-02-0009'),
('Lung Cancer', 'studyUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.103189108764313019491934667255&seriesUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.104616474240757574154876423123&objectUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.267212981954448819074140522716', 'Case 4', 'LIDC-IDRI-0016'),
('Lung Cancer', 'studyUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.232252967813565730694525674696&seriesUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.146744821244586368840068937301&objectUID=1.3.6.1.4.1.14519.5.2.1.4792.2001.145360848639150080488752783872', 'Case 3', 'LIDC-IDRI-0014'),
('Glioblastoma', 'studyUID=1.3.6.1.4.1.14519.5.2.1.7777.9002.695251996732711525695705170858&seriesUID=1.3.6.1.4.1.14519.5.2.1.7777.9002.605176515924083114740918850709&objectUID=1.3.6.1.4.1.14519.5.2.1.7777.9002.263022771968489960789052432845', 'Case 1', 'TCGA-02-0046'),
('Lung Cancer', 'studyUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.583820547490466057447627106523&seriesUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.280396351248518190986957310952&objectUID=1.3.6.1.4.1.14519.5.2.1.6450.9002.208032394198539400186069432273', 'Case 2', 'LIDC-IDRI-0015');

ALTER TABLE loginmember
  ADD PRIMARY KEY (traineeid);

ALTER TABLE residentiddefinition
  ADD PRIMARY KEY (traineeid);

ALTER TABLE teachingfiledata
  ADD PRIMARY KEY (caseuuid);

COMMIT;
