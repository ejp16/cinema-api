# Cinema API with Laravel

This project is a **RESTful API developed in Laravel** for managing a movie theater seat reservation system.
It uses JWT for authentication, is intended to have 3 roles: customer, employee and manager, there are middlewares to handle user's request based on their roles, a manager can access to all employee routes

## Endpoints
Every endpoint needs to be called using "api" prefix

### Authentication
####  POST /register

Request sample

    {
    	name: string,
    	lastname: string,
    	email: string,
    	password: string,
    	confirmation_password: string
    }

#### POST /login
Request sample

    {
    	email: string,
    	password: string
    }

Response sample

    {
    	access_token: string JWT
    	token_type: bearer,
    	expires_in: int
     }
#### POST /me
Request sample

    {
	    token: string JWT
    }

Response sample

    {
      data: {
        id: int,
        name: string,
        lastname: string,
        email: string,
        created_at: datetime,
        updated_at: datetime,
        roles: [
          {
            id: int,
            role_name: string,
            created_at: datetime,
            updated_at: datetime,
          },          
        ]
      }
    }

#### POST /logout
Request sample

    {
     token: string JWT
    }
***
### Movies
Entity structure 

    {
    	id: int,
    	title: string,
    	description: string,
    	duration: string,
    	genre_id: int,
    	rating: string,
    	image: string,
    }
#### GET /movies
Response sample

    {
    	id: int,
    	title: string,
    	description: string,
    	duration: string,
    	genre_id: int,
    	rating: string,
    	image: string,
    	added_by: string
    }
#### POST /movie
Request example

    {
	    id: int,
	    title: string,
	    description: string,
	    duration: string,
	    genre_name: string,
	    rating: string,
	    image: string,
	    token: string JWT
	}
#### UPDATE /movie/id
Request example

    {
        id: int,
        title: string,
        description: string,
        duration: string,
        genre_name: string,
        rating: string,
        image: string,
	    token: string JWT
    }
#### DELETE /movie/id
Request example

    {
    	token: string JWT
    }

***
### Movie Genre
#### GET /genres
Response example

    {
    	id: int,
    	genre_name: string
    }
#### POST /genre
Request example

    {
    	genre_name: string,
    	token: string JWT
    }
#### PUT /genre/id
Request example

    {
    	genre_name: string,
    	token: string JWT
    }
  #### DELETE /genre/id
Request example

    {
    	genre_name: string,
    	token: string JWT
    }
 ***
 ### Theaters
 #### GET /theaters
Request example

    {
	    id: int
    	room_name: string,
    	token: string JWT
    }
 #### POST /theater
Request example

    {
    	room_name: string,
    	token: string JWT
    }
 #### UPDATE /theater/id
Request example

    {
    	room_name: string,
    	token: string JWT
    }
 #### DELETE /theater/id
Request example

    {
    	room_name: string,
    	token: string JWT
    }
 ***
 ### Seats
 #### GET /seats
Request example

    {
    	id: int,
    	theater_id: int,
    	row: string,
    	number: string,
    	type: string
    	token: string JWT
    }
 #### POST /seat
Request example

    {
    	theater_id: int,
    	row: string,
    	number: string,
    	type: string
    	token: string JWT
    }
 #### PUT /seat/id
Request example

    {
    	theater_id: int,
    	row: string,
    	number: string,
    	type: string
    	token: string JWT
    }
 #### DELETE /seat/id
 ***
 ### Projections
 #### GET /projections
Request example

    {
    	id: int,
    	movie_id: int,
    	theater_id: int,
    	start_date: datetime
    	token: string JWT
    }
 
 #### POST /projection
Request example

    {
    	movie_id: int,
    	theater_id: int,
    	start_date: datetime
    	token: string JWT
    }
 
 #### PUT /projection/id
Request example

    {
    	movie_id: int,
    	theater_id: int,
    	start_date: datetime
    	token: string JWT
    }
 
 #### DELETE /projection/id
 ***
 ### Reservation
 #### GET /reservations
 Request example

     {
    	 id: string,
    	 projection_id: int,
    	 user_id: int,
    	 amount: int,
    	 seats: [
	    	 {
		    	theater_id: int,
		    	row: string,
		    	number: string,
		    	type: string
		    	token: string JWT
	    	 }
    	 ]
     }

 #### POST /reservation
 Request example

     {
    	 id: string,
    	 projection_id: int,
    	 user_id: int,
    	 amount: int,
    	 seats: [seat_id]
     }
 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
