import mysql.connector
from random import randint, randrange

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="farmato"
)

# CREATE TABLE sensor_data (
#   time_stamp datetime DEFAULT current_timestamp(),
#   sensor_user_unique_id varchar(100) NOT NULL,
#   soil_moisture float DEFAULT NULL,
#   temperature float DEFAULT NULL,
#   humidity float DEFAULT NULL,
#   irrigation_on_off_status tinyint(1) DEFAULT NULL,
#   pump_on_off_status tinyint(1) DEFAULT NULL,
#   FOREIGN KEY (sensor_user_unique_id) REFERENCES user_login(user_unique_id)
# )

uid = "ccac34d923330a2968f12e163d5a2cd6"
day = 11
hour = 12
'2021-07-10 02:28:07'

mycursor = mydb.cursor()


# (%s, %s, %f, %f, %f, %d, %d)
sql = "INSERT INTO sensor_data (time_stamp, sensor_user_unique_id, soil_moisture, temperature, humidity, irrigation_on_off_status, pump_on_off_status) VALUES "
print(sql)
# for i in range(1,11):
for j in range(12):
    val = (f"2021-07-{day} {j}:28:07", f"{uid}", randint(20,90), randint(20, 40), randint(40, 95), randint(0,1), randint(0,1))
    # mycursor.execute(sql, val)
    print(val,end=',\n')
    # mydb.commit()

# print(mycursor.rowcount, "record inserted.")
# INSERT INTO sensor_data (time_stamp, sensor_user_unique_id, soil_moisture, temperature, humidity, irrigation_on_off_status, pump_on_off_status) VALUES ('2021-07-10 3:28:07', 'ccac34d923330a2968f12e163d5a2cd6', 56, 27, 79, 1, 0)