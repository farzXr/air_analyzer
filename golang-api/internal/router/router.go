package router

import (
	"github.com/gin-gonic/gin"
	"golang-api/internal/controllers/api/PostIndications"
	"golang-api/internal/websocket"
)

func InitRouter() *gin.Engine {
	r := gin.Default()
	r.GET("/getHello", func(c *gin.Context) {
		c.JSON(200, gin.H{"hello": "world"})
	})
	r.POST("/api/postIndications", PostIndications.PostIndicationsController)
	r.GET("/ws", func(c *gin.Context) {
		websocket.Heandler(c.Writer, c.Request)
	})
	return r
}
