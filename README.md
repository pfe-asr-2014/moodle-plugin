# MEM aka MOOC Event for Moodle

Plugin for the moodle platform to collect event from the TSP MOOC Platform.

## Installation

This section assume you already have a working moodle installation.

1. Copy the content of this repository under the `local/mem` folder of your moodle
   installation.
2. In moodle, go to `Site Administration > Plugins > Web services > Overview`.
3. Enable web services by following the link in the overview page.
4. Enable the protocol `rest` by following the link in the overview page.
5. Go to `Site Administration > Notifications`. You should see the plugin waiting
   to be installed, click on *Upgrade Moodle database now* to install it.
6. Congratulation, the plugin is installed ! You can now continue to the configuration
   section.

## Configuration

We need to allow our users to create their webservice token to be able to use our plugin.

To do that, go at `Administration > Site > Users > Permissions > Define roles`,
choose the role (generaly Student or Authenticated user), click on edit and allow
the capabilities `moodle/webservice:createtoken` and `webservice/rest:use`.
Save your change. The plugin is ready to be used.

## Using this plugin

This example use the incredible [HTTPie](https://github.com/jakubroztocil/httpie)
but you can use the http library of your choice.

1. Get your token

  ```sh
  http GET http://localhost:8080/login/token.php \
      username==test \
      password==moodle-1B \
      service==mem
  ```
2. Submit your event

  ```sh
  http POST http://localhost:8080/webservice/rest/server.php \
      wsfunction==local_mem_post_event \
      wstoken==<user_token> \
      moodlewsrestformat==json \
      category=="mooc" \
      action=="begin" \
      label=="Relational Database" \
      datetime=="2014-12-11T16:31:12.436+01:00"
  ```

## Event format

An event is formed as a json or xml object with the following properties:

- `category`: The category of the event (eg. *courses*)
- `action`: The action of the event (eg. *Begin*)
- `label`: The label of the event (eg. *Relational Database*)
- `datetime`: When the event occured (and not when it was submitted) in the ISO8601 format.

Example of an event in the json format:

```json
{
  "event": {
    "category": "mooc",
    "action"  : "begin",
    "label"   : "relational database",
    "datetime": "2014-12-11T16:31:12.436+01:00"
  }
}
```

An example of the data you can collect is given below. This example show you what
can be collected for a "courses" category.

| Action      |	Label: "Learning Python" | Label: "Relational Database" | Totals                                  |
|-------------|--------------------------|------------------------------|-----------------------------------------|
| Begin       |	2 visits w/Event         | 3 visits w/Event             | 5 unique events "Begin"                 |
| Open        |	10 visits w/Event        | 5 visits w/Event             | 15 unique events "Open"                 |
| Submit      |	2 visits w/Event         | 8 visits w/Event             | 10 unique events "Submit"               |
| Totals      |	14 unique events for LP  | 16 unique events for RD      | 30 unique events for category "courses" |

## Development

This repository provide a Dockerfile and a [fig](http://www.fig.sh) configuration.

You can spin up an environment with the command `fig up`. You'll have an already configured moodle instance available with the followings users:

* admin/moodle-1B: admin user
* test/moodle-1B: test user with webservice activated

## Export SQL data from the db container

Before executing the command:
* Replace `pluginmoodle_db_1` with the db container name (if launch via fig, it is `pluginmoodle_db_1`)
* Be sure to be in the base directory of this repository

Then execute:
```sh
docker exec -it pluginmoodle_db_1 mysqldump -u moodle --password=moodle --databases moodle > dockerfiles/db/moodle.sql
```
