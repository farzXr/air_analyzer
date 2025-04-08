package PostIndications

import (
	"github.com/gin-gonic/gin"
	"golang-api/internal/models"
	"net/http"
)

func postIndicationsRequest(c *gin.Context) *models.Indications {
	var indications models.Indications

	err := c.ShouldBindJSON(&indications)
	if err != nil {
		c.JSON(http.StatusBadRequest, gin.H{"request error": err.Error()})
	}

	return &indications
}
