package internal

import (
	"fmt"
	"github.com/gin-gonic/gin"
	"github.com/gorilla/websocket"
	"net/http"
)

// Объявляем переменные
var upgrader = websocket.Upgrader{
	CheckOrigin: func(r *http.Request) bool { return true },
}

func temp() {
	r := gin.Default()

	// Эндпоинт для WebSocket
	r.GET("/ws", func(c *gin.Context) {
		wsHandler(c.Writer, c.Request)
	})

	r.Run(":8080")
}

// Обработчик WebSocket соединений
func wsHandler(w http.ResponseWriter, r *http.Request) {
	_, err := upgrader.Upgrade(w, r, nil)
	if err != nil {
		fmt.Println("❌ Ошибка при апгрейде:", err)
		return
	}
}
