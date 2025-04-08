package websocket

import (
	"github.com/gorilla/websocket"
	"log"
)

func InitClient() {
	ws, _, err := websocket.DefaultDialer.Dial("ws://air-analyzer-golang-1:8080/ws", nil)
	if err != nil {
		log.Fatal("dial:", err)
	}
	defer ws.Close()
}
