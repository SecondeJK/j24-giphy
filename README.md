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
