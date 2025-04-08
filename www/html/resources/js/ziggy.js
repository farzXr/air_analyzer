const Ziggy = {"url":"http:\/\/localhost:8080","port":8080,"defaults":{},"routes":{"api.getWeek":{"uri":"api\/getWeek\/{interval}","methods":["GET","HEAD"],"parameters":["interval"]},"getStatistic":{"uri":"api\/getStatistic\/{intervals}","methods":["GET","HEAD"],"parameters":["intervals"]},"welcome":{"uri":"\/","methods":["GET","HEAD"]},"indications":{"uri":"indications","methods":["GET","HEAD"]},"CH4":{"uri":"indications\/ch4","methods":["GET","HEAD"]},"CH4.statistic":{"uri":"indications\/ch4\/statistic","methods":["GET","HEAD"]},"CO2":{"uri":"indications\/co2","methods":["GET","HEAD"]},"CO":{"uri":"indications\/co","methods":["GET","HEAD"]},"TVOC":{"uri":"indications\/tvoc","methods":["GET","HEAD"]},"HCHO":{"uri":"indications\/hcho","methods":["GET","HEAD"]},"\u0442\u0435\u043c\u043f\u0435\u0440\u0430\u0442\u0443\u0440\u0430":{"uri":"indications\/temp","methods":["GET","HEAD"]},"\u0432\u043b\u0430\u0436\u043d\u043e\u0441\u0442\u044c":{"uri":"indications\/humi","methods":["GET","HEAD"]},"PM":{"uri":"indications\/pm","methods":["GET","HEAD"]},"co.index":{"uri":"co","methods":["GET","HEAD"]},"co.statistics.avg":{"uri":"co\/statistics\/avg\/{period}","methods":["GET","HEAD"],"parameters":["period"]},"co.statistics.max":{"uri":"co\/statistics\/max\/{period}","methods":["GET","HEAD"],"parameters":["period"]},"co.statistics.min":{"uri":"co\/statistics\/min\/{period}","methods":["GET","HEAD"],"parameters":["period"]},"co.api.":{"uri":"co\/api\/getReadingDevice","methods":["GET","HEAD"]},"testWs.index1":{"uri":"testWs\/index1","methods":["GET","HEAD"]},"testWs.index2":{"uri":"testWs\/index2","methods":["GET","HEAD"]},"testWs.sendData":{"uri":"testWs\/sendData","methods":["POST"]},"testWs.getData":{"uri":"testWs\/getData","methods":["GET","HEAD"]},"home":{"uri":"home","methods":["GET","HEAD"]},"login":{"uri":"login","methods":["GET","HEAD"]},"logout":{"uri":"logout","methods":["POST"]},"register":{"uri":"register","methods":["GET","HEAD"]},"password.request":{"uri":"password\/reset","methods":["GET","HEAD"]},"password.email":{"uri":"password\/email","methods":["POST"]},"password.reset":{"uri":"password\/reset\/{token}","methods":["GET","HEAD"],"parameters":["token"]},"password.update":{"uri":"password\/reset","methods":["POST"]},"password.confirm":{"uri":"password\/confirm","methods":["GET","HEAD"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
