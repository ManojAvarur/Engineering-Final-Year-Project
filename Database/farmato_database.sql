CREATE TABLE user_login (
  user_unique_id varchar(100) PRIMARY KEY,
  user_full_name char(50) NOT NULL,
  user_phone_no int(20) NOT NULL,
  user_password varchar(255) NOT NULL,
  user_email_id varchar(100) NOT NULL
)


CREATE TABLE sensor_data (
  time_stamp datetime DEFAULT current_timestamp(),
  sensor_user_unique_id varchar(100) NOT NULL,
  soil_moisture float DEFAULT NULL,
  temperature float DEFAULT NULL,
  humidity float DEFAULT NULL,
  water_level int(11) DEFAULT NULL,
  pump_status tinyint(1) DEFAULT NULL,
  FOREIGN KEY (sensor_user_unique_id) REFERENCES user_login(user_unique_id)
)


CREATE TABLE cookie_data (
    cookie_user_unique_id varchar(100) NOT NULL,
    token_id_1 varchar(50) NOT NULL,
    token_id_2 varchar(50) NOT NULL,
    FOREIGN KEY (cookie_user_unique_id) REFERENCES user_login(user_unique_id)
)


CREATE TABLE user_nodemcu_com (
  unc_user_unique_id varchar(100) NOT NULL,
  pump_manual_overide_request BOOLEAN,
  sensor_data_request BOOLEAN,
  user_freeze_flag BOOLEAN,
  nodemcu_freeze_flag BOOLEAN,
  temperature float DEFAULT NULL,
  humidity float DEFAULT NULL,
  soil_moisture float DEFAULT NULL,
  data_recieved_flag BOOLEAN,
  FOREIGN KEY (unc_user_unique_id) REFERENCES user_login(user_unique_id)
)


