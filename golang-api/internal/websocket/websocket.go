package websocket

import (
	"encoding/json"
	"github.com/gorilla/websocket"
	"net/http"
)

var messageChan = make(chan interface{})

var upgrader = websocket.Upgrader{
	ReadBufferSize:  1024,
	WriteBufferSize: 1024,
	CheckOrigin:     func(r *http.Request) bool { return true },
}

func Heandler(w http.ResponseWriter, r *http.Request) {
	ws, err := upgrader.Upgrade(w, r, nil)
	if err != nil {
		return
	}

	go func() {
		for msg := range messageChan {
			jsonData, _ := json.Marshal(msg)
			err := ws.WriteMessage(websocket.TextMessage, jsonData)
			if err != nil {
				break
			}
		}
	}()
}

func SendToWebSocket(data interface{}) {
	messageChan <- data
}
