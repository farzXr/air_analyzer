package PostIndications

import (
	"database/sql"
	"fmt"
	"github.com/gin-gonic/gin"
	"golang-api/internal/database/mysql"
	"golang-api/internal/models"
	"math"
	"net/http"
	"reflect"
	"strings"
)

func roundFloat32(value float32) float32 {
	return float32(math.Round(float64(value)*100) / 100)
}

func insertData(db *sql.DB, value float32, dateTime string, table string) error {
	query := fmt.Sprintf("INSERT INTO %s (value, dateTime) VALUES (?, ?)", table)

	_, err := db.Exec(query, value, dateTime)
	if err != nil {
		return err
	}
	return nil
}

func postIndicationsService(indications *models.Indications, c *gin.Context) error {
	var db = mysql.DB
	v := reflect.ValueOf(*indications)
	t := reflect.TypeOf(*indications)

	for i := 0; i < v.NumField(); i++ {
		field := t.Field(i).Name
		if field == "Id" || field == "DateTime" {
			continue
		}

		value := v.Field(i).Interface().(float32)

		if err := insertData(db, roundFloat32(value), indications.DateTime, strings.ToLower(field)); err != nil {
			c.JSON(http.StatusBadRequest, gin.H{"service error": err.Error()})
			return err
		}
	}

	return nil

}
