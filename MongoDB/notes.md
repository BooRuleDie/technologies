# Anti patterns: 

* **Massive Arrays**
	- 16 mb document size limit -> unbound arrays might be problem
	- Instead of using such arrays create another collection
	- Or you can set a limit by using some business logic in the backend

* **Massive Collections** 

* **Unnecessary Indexes**
	- It's reccommended to use maximum of 50 indexes.
	- Only create indexes for most frequent queries
	- MongoDB Atlas has an interface that shows how frequently an index is being used. It might be useful to detect unnecessary indexes.

* If you can't figure out how to increase performance for a specific case, you can use the mongodb forums to ask.