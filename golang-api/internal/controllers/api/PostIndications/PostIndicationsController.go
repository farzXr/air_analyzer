package PostIndications

import (
	"github.com/gin-gonic/gin"
	"golang-api/internal/websocket"
	"net/http"
)

func PostIndicationsController(c *gin.Context) {
	var indications = postIndicationsRequest(c)

	websocket.SendToWebSocket(indications)

	err := postIndicationsService(indications, c)
	if err != nil {
		return
	}

	c.JSON(http.StatusOK, gin.H{"status": "date sended into websocket"})
	return
}
