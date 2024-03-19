-- Create database and use it.
create database if not exists ipl;
use ipl;

-- Create tables.
create table if not exists Teams (
  team_id int auto_increment primary key,
  team_name varchar(50),
  captain varchar(50)
);

create table if not exists Matches (
  match_id int auto_increment primary key,
  venue varchar(200) not null,
  date_of_match date,
  team1_id int not null,
  team2_id int not null,
  toss_won_by varchar(50),
  match_won_by varchar(50),
  foreign key (team1_id) references Teams (team_id) on delete cascade,
  foreign key (team2_id) references Teams (team_id) on delete cascade
);

-- Insert Teams.
insert into Teams(team_name, captain) values
('CSK','Dhoni'),
('GT','Hardik'),
('RR','Samson'),
('DD','Pant'),
('RCB','Faf'),
('MI','Rohit'),
('KKR','Shreyas'),
('PBKS','Shikhar'),
('LSG','Rahul'),
('SRH','Markram');

-- Insert Matches.
insert into Matches
(venue, date_of_match, team1_id, team2_id, toss_won_by, match_won_by)
values
('Mumbai', '2024-03-04', 1, 6, 'MI' ,'CSK'),
('Ahemdabad', '2024-03-04', 2, 3, 'RR', 'GT'),
('Bangalore', '2024-03-05', 4, 5, 'RCB', 'RCB'),
('Kolkata', '2024-03-06', 7, 8, 'PBKS' ,'KKR'),
('Hyderabad', '2024-03-06', 9, 10, 'SRH', 'SRH');

-- Show output.
select m.venue, m.date_of_match, t.team_name team1, t2.team_name team2,
t.captain team1_captain, t2.captain team2_captain, m.toss_won_by, m.match_won_by
from Matches as m join Teams as t on m.team1_id=t.team_id join
Teams as t2 on m.team2_id=t2.team_id;
