require "apache2"  
print("kkkkkkkkk")
function handle(r)  
  r.content_type = "text/html"  
  r:write "Hello World from <strong>mod_lua</strong>."  
  return apache2.OK  
end
require "httpd"
 local request_fields = { "uri", "protocol", "hostname", "path", "path_info", "args",
                 "method", "filename", "filedir", "user", "auth_type",
                 "local_ip", "remote_ip" }
 request, args = ...
 httpd.set_content_type("text/html; charset=utf8")
 httpd.write("Hello Lua Worldrn")
 for _, key in ipairs(request_fields) do
         httpd.write(key .." -> " .. (request[key] or "(not set)") .. "rn")
 end