# VOCI

## Table of contents

-   [Overview](#overview)
    -   [Start2impact](#Start2impact)
    -   [Project](#Project)
    -   [Built with](#built-with)
-   [Getting started](#Getting-started)
    -   [Installation](#Installation)
-   [Usage](#Usage)
    -   [Authors](#Authors)
    -   [Media](#Mdia)
    -   [Posts](#Posts)
    -   [Filter](#Filter)
-   [Links](#Links)
-   [License](#License)

## Overview

### Start2impact

This is my first php project from the **PHP Start2Impact's** guide.
You can find all the info [here](https://www.start2impact.it/percorsi/) about start2impact courses.

### Project

Voci, a media brand created to give space to the voice of women, wants information to be increasingly aggregating for the latter and can direct them to issues close to them and often little dealt with in traditional media.
Assuming all that, the main goal is to create a REST API to execute CRUD operations in the database.

### Built with

-   [Laravel](https://laravel.com/)
-   [Tailwind CSS](https://tailwindcss.com/)
-   [MySQL](https://www.mysql.com/it/downloads/)

## Getting Started

You can try the visual online site [here](http://voci-media.herokuapp.com/) (Any new data will be deleted every hour for testing and storing reasons )

Follow these steps to try the REST API in local. (RECOMMENDED)

Please check the official laravel installation guide for requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

If you need to install [Git](https://git-scm.com/downloads)

### Installation

1. Clone the repository locally with the git command:

    ```sh
    git clone https://github.com/emptinxss/Voci.git
    ```

2. Switch to the project folder:

    ```sh
    cd voci
    ```

3. Install composer dependencies:

    ```sh
    composer install
    ```

4. Install NPM Dependencies:

    ```sh
    npm install
    ```

5. Copy the example env file and make the required configuration changes in .env file:

```sh
 cp .env.example .env
```

6.  Generate an app encryption key:

```sh
 php artisan key:generate
```

7.  Create an empty database for our application with your preferred tools (recommended [XAMPP](https://www.apachefriends.org/it/index.html), phpMyAdmin or MySQL Workbench)

8.  In the .env file, add database information to allow Laravel to connect to the database

    In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created.

9.  Migrate the database

```sh
 php artisan migrate
```

10. Seed the database with dummy data to test the app faster (optional):

```sh
 php artisan db:seed
```

11. Start the local development server:

```sh
   php artisan serve
```

You can now access the server at http://localhost:8000

You will find the REST API at http://localhost:8000/api/v1/ (then use the endpoints below)

## Usage

Raccomended tool to try the requests. [Postman](https://www.postman.com/)

REST API endpoints:

### Authors

-   **GET** /api/v1/authors
-   **GET** /api/v1/authors/{id}
-   **POST** /api/v1/authors
-   **PUT** /api/v1/authors/{id}
-   **PATCH** /api/v1/authors/{id}
-   **DELETE** /api/v1/authors/{id}

### Media

-   **GET** /api/v1/media
-   **GET** /api/v1/media/{id}
-   **POST** /api/v1/media
-   **PUT** /api/v1/media/{id}
-   **PATCH** /api/v1/media/{id}
-   **DELETE** /api/v1/media/{id}

> **Note**
> For a succesful POST request you have to manually add the media file to path "public/uploads/media" and write the exact name of the file like the example below:

![Immagine 2022-10-09 092537](https://user-images.githubusercontent.com/83363396/194754715-2de0c1e7-96ab-4f00-a654-759e680f1f8d.png)

Make sure to select raw and JSON when performing POST PUT and PATCH request.

EXTENSION SUPPORTED:

-   IMAGE: jpg|png|jpeg|gif
-   AUDIO: mp3|ogg|wav
-   VIDEO: mp4

TROUBLESHOOTING:
If you dont get the response automatically check on the headers tab if you get **Content/type** application/json.

![Immagine 2022-10-09 093802](https://user-images.githubusercontent.com/83363396/194754726-fa020f35-0119-4319-b2e4-7bf4ba832c95.png)

Alternatively, you can force it by adding a new header **Accept** application/json.

![Immagine 2022-10-09 093918](https://user-images.githubusercontent.com/83363396/194754728-877d9ca6-9345-430e-83d1-b8da7b90b991.png)

### Posts

-   **GET** /api/v1/posts
-   **GET** /api/v1/posts/{id}
-   **POST** /api/v1/posts
-   **PUT** /api/v1/posts/{id}
-   **PATCH** /api/v1/posts/{id}
-   **DELETE** /api/v1/posts/{id}

### Filter

You can filter by **KEY** with [eq] that rappresent '=' or [lk] that means 'like', or including the posts related to the **authors** or **media**.

**GET** request : filter posts by name that must be euqal to the value [eq] => '='

```sh
   /api/v1/posts?post_name[eq]=happiness
```

**GET** request : filter media by description that contains the value [lk] => 'like'

```sh
   /api/v1/media?description[lk]=%good%
```

**GET** request : filter authors by including the posts related, u must use **&** to add another query.

```sh
   /api/v1/authors?surname[eq]=Jackson&includePosts=true
```

## Links

-   Test my app on [Heroku](http://voci-media.herokuapp.com/posts)
-   My other projects on [Github](https://github.com/emptinxss)

## License

Distributed under the MIT License. See `LICENSE` for more information.
