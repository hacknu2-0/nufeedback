
from pyfcm import FCMNotification
import time

push_service = FCMNotification(api_key="XXXXXXX")



registration_id = "XXX"
message_title = "Please submit feedback for CS 122"
message_body = "The topics today are X X X"
time.sleep(5)
result = push_service.notify_single_device(registration_id=registration_id, message_title=message_title, message_body=message_body)


print(result)
