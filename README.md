## Giphy API

This small Laravel app interacts with the Giphy API

Environment Variables from Giphy (self documenting names, hopefully!)
```GIPHY_API_KEY```
```GIPHY_API_BASE_PATH```

Testing methods are being implemented to show SOME true TDD, but due to time restrictions these will only really
be fixed and the app actually passes it's own unit tests once I do a refactor branch to do some true tests that use
mocking/stubs.

### Task 1 Completed (hit an endpoint, display all the most recent data cached to one hour)
You can get this from the landing page. There's nothing pretty here: the app route sends it to a controller that
fetches the data and dumps it out in a blade template.

### Task 2 Completed (search function)
I set it as an option url parameter that's passed into the API wrapper. Again, it dumps out. In fact, because it does the same thing, I should really merge the view template in these two tasks.

### Task 3 Sort-Of Completed (persist random endpoint)
The spec asks for "multiple tables", so I had two tables logically defined with a 1-2-1 relationship, which I would have had to do anyway as the image payload is a fairly complex structured JSON. It looks from later on that the spec actually wants the model to rotate between dynamic tables which is a bizarre fudge that I don't really see why you'd want to do that. But we'll get to that

EDIT: CTO confirmed that it's not rotating models. Huzzah!

### Task 4 Completed (stored procedure)
You can find the raw SQL for this in resources/sql/task4.sql. Happy record traversing!

### Task 5 Completed (JS search for stored entities)
The route/js-search takes you into a Vue app.
There's a single search component that has a bound
data property, hitting search then returns a json
payload (that should be cached but isn't right now,
that's demonstrated elsewhere) and renders it. The images 
are quite sizable: a front end cache like Varnish would be 
nice here.

Ideally I would create a reusable component here that takes
a prop of "gifs" to render them out.

I didn't actually do the last task set because it
effectively does the same thing: render out local
entities with JS.
