# MEM aka MOOC Event for Moodle

Plugin for the moodle platform to collect event from the TSP MOOC Platform.

## Installation

TODO

## Using this plugin

This example use the incredible [HTTPie](https://github.com/jakubroztocil/httpie) but you can use the http library of your choice.

1. Get your token
  ```sh
  http GET http://localhost:8080/login/token.php \
      username==admin \
      password==moodle-1B \
      service==mem
  ```
2. Submit your event
  ```sh
  http POST http://localhost:8080/webservice/rest/server.php \
      wsfunction==local_mem_post_event \
      wstoken==user_token \
      moodlewsrestformat==json \
      < docker/event.json
  ```

## Event format

An event is formed as a json or xml object with the following properties:

- `category`: The category of the event (eg. *courses*)
- `action`: The action of the event (eg. *Begin*)
- `label`: The label of the event (eg. *Relational Database*)

An example of the data you can collect is given below. This example show you what
can be collected for a "courses" category.

| Action      |	Label: "Learning Python" | Label: "Relational Database" | Totals                                  |
|-------------|--------------------------|------------------------------|-----------------------------------------|
| Begin       |	2 visits w/Event         | 3 visits w/Event             | 5 unique events "Begin"                 |
| Open        |	10 visits w/Event        | 5 visits w/Event             | 15 unique events "Open"                 |
| Submit      |	2 visits w/Event         | 8 visits w/Event             | 10 unique events "Submit"               |
| Totals      |	14 unique events for LP  | 16 unique events for RD      | 30 unique events for category "courses" |
