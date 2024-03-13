package main

import (
	"io"
	"net/http"
	"os"

	"github.com/labstack/echo/v4"
)


func main() {
	e := echo.New()
	e.GET("/", func(c echo.Context) error {
		return c.String(http.StatusOK, "Hello, World!")
	})
	e.GET("/get-path-parameter/:id", handleGetPathParameter)
	e.GET("/get-query-parameter", handleGetQueryParamter)
	e.POST("/get-form-parameter", handlePostFormParameter)
	e.POST("/get-form-file", handlePostFormFile)

	e.Logger.Fatal(e.Start("localhost:1323"))
}

// Path Parameter
func handleGetPathParameter(c echo.Context) error {
	id := c.Param("id")
	return c.String(http.StatusOK, id)
}

// Query Parameter
// important to note that it doesn't work if you make a request to /get-query-parameter/?user_id=3 as the route is not defined with a trailing /
func handleGetQueryParamter(c echo.Context) error {
	id := c.QueryParam("user_id")
	return c.String(http.StatusOK, id)
}

// Form application/x-www-form-urlencoded
func handlePostFormParameter(c echo.Context) error {
	id := c.FormValue("user_id")
	return c.String(http.StatusOK, id)
}

// Form multipart/form-data
func handlePostFormFile(c echo.Context) error {
	id := c.FormValue("user_id")
	if id == "" {
		return echo.NewHTTPError(http.StatusBadRequest, "user_id is required")
	}
	
	file, err := c.FormFile("file", )
	if err != nil {
		return err
	}

	// source
	src, err := file.Open()
	if err != nil {
		return err
	}
	defer src.Close()

	// destination
	dst, err := os.Create(file.Filename)
	if err != nil {
		return err
	}
	defer dst.Close()

	// copy
	if _, err := io.Copy(dst, src); err != nil {
		return err
	}

	return c.HTML(http.StatusOK, "<b>" + id + "</b>")
}
